<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dragoon\AdminBundle\Form\Type\Dvdfr\Search;
use Symfony\Component\HttpFoundation\Response;
use Dragoon\AdminBundle\Entity\Dvdfr;
use Dragoon\AdminBundle\Entity\Fiche;
use Dragoon\AdminBundle\Entity\Category;
use Dragoon\AdminBundle\Entity\Distributeur;
use Dragoon\AdminBundle\Entity\Editeur;
use Dragoon\AdminBundle\Entity\Studio;
use Dragoon\AdminBundle\Entity\Star;
use Dragoon\AdminBundle\Entity\Job;
use Dragoon\AdminBundle\Entity\StarJob;

class DvdfrController extends Controller
{
    
    private $_user_agent = 'Dalvik/1.6.0 (Linux; U; Android 4.2.2; Nexus 4 Build/JDQ39E)';
    
    public function searchAction($search = '')
    {
        $form = $this->get('form.factory')->create(new Search());
        
        return $this->render(
                'DragoonAdminBundle:Dvdfr:search.html.twig',
                array(
                    'form' => $form->createView(),
                    'title'   => 'Recherche sur DVDFR',
                )
        );
    }
    
    public function listAction($search)
    {
        //$response = $this->getDvdFrResponse('http://localhost/test.xml');
        $response = $this->getDvdFrResponse('http://www.dvdfr.com/api/search.php?title=' . $search . '&produit=DVD');
        
        $xml = simplexml_load_string($response);
        $aList = array();
        foreach($xml as $oDvd) {
            $dvd = array();
            $dvd['id'] = (string)$oDvd->id;
            $dvd['title'] = (string)$oDvd->titres->fr;
            $dvd['year'] = (string)$oDvd->annee;
            $dvd['edition'] = (string)$oDvd->edition;
            $dvd['editeur'] = (string)$oDvd->editeur;
            
            $stars = array();
            foreach($oDvd->stars->star as $oStar) {
                $name = (string)$oStar;
                $type = (string)$oStar['type'];
                $stars[] = str_replace(' ', '&nbsp', $name . ' (' . $type . ')');
            }
            
            $dvd['staff'] = implode('<br/>', $stars);
            $aList[] = $dvd;
        }
        
        return new Response(json_encode($aList), 200, array('content-type' => 'application/json'));
    }
    
    public function viewAction($id) {
        
        $xml = simplexml_load_string($this->getFicheDvdFrById($id));
        
        $staff = $xml->addChild('staff');
        foreach($xml->stars->star as $value) {
            $type = (string)$value['type'];
            $id = (string)$value['id'];
            $value = (string)$value;
            $staff->addChild($type, $value);
        }

        return new Response(json_encode($xml), 200, array('content-type' => 'application/json'));
    }

    private function getFicheDvdFrById($id) {
        $dvdfr_dir = $this->get('kernel')->getRootDir() . '/dvdfr';

        if (!is_dir($dvdfr_dir)) {
            mkdir($dvdfr_dir);  
        }

        if (file_exists($dvdfr_dir . '/' . $id . '.xml')) {
            $response = file_get_contents($dvdfr_dir . '/' . $id . '.xml');
        } else {
            $response = $this->getDvdFrResponse('http://www.dvdfr.com/api/dvd.php?id=' . $id);
            file_put_contents($dvdfr_dir . '/' . $id . '.xml', $response);
        }
        return $response;
    }

    public function addAction($id) {
        $em = $this->getDoctrine()->getManager();

        $xml = simplexml_load_string($this->getFicheDvdFrById($id));

        $fiche = new Fiche();
        $fiche->setTitleFr($xml->titres->fr)
                ->setTitleVo($xml->titres->vo)
                ->setTitleAltFr($xml->titres->alternatif)
                ->setTitleAltVo($xml->titres->alternatif_vo)
                ->setEdition(utf8_decode($xml->edition))
                ->setYear($xml->annee)
                ->setSortie(new \DateTime($xml->sortie))
                ->setSynopsis(htmlentities($xml->synopsis, ENT_QUOTES, "UTF-8"))
                ->setLength($xml->duree)
                ->setReference($xml->reference)
                ;

        $this->addCategory($fiche, $xml, $em);
        $this->addEditeur($fiche, $xml, $em);
        $this->addDistributeur($fiche, $xml, $em);
        $this->addStudio($fiche, $xml, $em);
        $this->addStar($fiche, $xml, $em);

        $em->persist($fiche);
        $em->flush();

        return new Response('1', 200);
    }

    private function addStar(&$fiche, $xml, $em) {
        if (sizeof($xml->stars->star) > 0) {
            foreach ($xml->stars->star as $aStar) {
                $name = (string)$aStar;
                $type = (string)$aStar['type'];
                $id = (string)$aStar['id'];
                
                $oStarJob = new StarJob();

                $oStar = $em->getRepository('DragoonAdminBundle:Star')
                            ->findOneByDvdfrId($id);
                if (!$oStar) {
                    $oStar = new Star();
                    $oStar->setName($name);
                    $oStar->setdvdfrId($id);
                    $em->persist($oStar);
                    $em->flush();
                }
                $oStarJob->setStar($oStar);

                $oJob = $em->getRepository('DragoonAdminBundle:Job')
                            ->findOneByName($type);
                if (!$oJob) {
                    $oJob = new Job();
                    $oJob->setName($type);
                    $em->persist($oJob);
                    $em->flush();
                }
                $oStarJob->setJob($oJob);

                $fiche->addStar($oStarJob);
            }
        }
    }
    
    private function addStudio(&$fiche, $xml, $em) {
        if ($xml->studio) {
            $sStudios = $xml->studio;
            $aStudios = explode(',', $sStudios);
            foreach ($aStudios as $studio) {
                $studio = trim($studio);
                $oStudio = $em->getRepository('DragoonAdminBundle:Studio')
                            ->findOneByName($studio);
                if (!$oStudio) {
                    $oStudio = new Studio();
                    $oStudio->setName($studio);
                }
                $fiche->addStudio($oStudio);
            }
        }
    }

    private function addDistributeur(&$fiche, $xml, $em) {
        if ($xml->distributeur) {
            $distributeur = $xml->distributeur;
            $oDistributeur = $em->getRepository('DragoonAdminBundle:Distributeur')
                            ->findOneByName($distributeur);
            if (!$oDistributeur) {
                $oDistributeur = new Distributeur();
                $oDistributeur->setName($distributeur);
            }
            $fiche->addDistributeur($oDistributeur);
        }
    }

    private function addEditeur(&$fiche, $xml, $em) {
        if ($xml->editeur) {
            $editeur = $xml->editeur;
            $oEditeur = $em->getRepository('DragoonAdminBundle:Editeur')
                            ->findOneByName($editeur);
            if (!$oEditeur) {
                $oEditeur = new Editeur();
                $oEditeur->setName($editeur);
            }
            $fiche->addEditeur($oEditeur);
        }
    }

    private function addCategory(&$fiche, $xml, $em) {
        if (sizeof($xml->categories->categorie) > 0) {
            foreach ($xml->categories->categorie as $categorie) {
                $name = (string)$categorie;
                $cat = $em->getRepository('DragoonAdminBundle:Category')
                            ->findOneByName($name);
                if (!$cat) {
                    $cat = new Category();
                    $cat->setName($name);
                }
                $fiche->addCategory($cat);
            }
        }
    }

    private function getDvdFrResponse($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->_user_agent);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }

}