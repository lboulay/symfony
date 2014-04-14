<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class BaseController extends Controller
{
    private $formClass = false;
    
    public function listAction($entity)
    {
        $em = $this->getDoctrine()->getManager();
        $datas = $em->getRepository('DragoonAdminBundle:' . ucfirst($entity))->findAll();
        
        $this->getFormClass($entity);
        $form = $this->getFormObj();
        $headers = $this->formClass->getColumnHeader();
        
        return $this->render(
                'DragoonAdminBundle::list.html.twig',
                array(
                    'datas' => $datas,
                    'headers' => $headers,
                    'entity' => $entity,
                    'title' => $form->getName()
                )
        );
    }
    
    public function editAction($entity, $id = '-2')
    {
        $em = $this->getDoctrine()->getManager();
        if ($id == -2)
        {
            $entityClass = 'Dragoon\AdminBundle\Entity\\' . ucfirst($entity);
            $data = new $entityClass();
        }
        else
        {
            $data = $em->getRepository('DragoonAdminBundle:' . ucfirst($entity))->find($id);
        }
        
        $this->getFormClass($entity);
        $form = $this->getFormObj($data);
        
        $request = $this->get('request');
        
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $this->get('session')->getFlashBag()->add(
                        'success',
                        'Vos changements ont été sauvegardés !'
                );
                $em->persist($data);
                $em->flush();
                
                if ($form->get('save&list') && $form->get('save&list')->isClicked())
                {
                    return $this->redirect($this->generateUrl('dragoon_admin_list', array('entity' => $entity)));
                }
            } else {
                $this->get('session')->getFlashBag()->add(
                        'error',
                        'Vos changements n\'ont pas été sauvegardés !'
                );
            }
        }
        
        return $this->render('DragoonAdminBundle::edit.html.twig', array(
            'form' => $form->createView(),
            'title' => $form->getName()
        ));
    }
    
    public function getFormObj($data = null)
    {
        if (!$this->formClass) {
            throw new BadMethodCallException('There no Form instance.');
        }
        
        return $this->get('form.factory')->create($this->formClass, $data);
    }
    
    public function getFormClass($entity)
    {
        if (!$this->formClass)
        {
            $formClass = 'Dragoon\AdminBundle\Form\Type\\' . ucfirst($entity);
            $this->formClass = new $formClass();
        } 
        
        return $this->formClass;
    }
}
