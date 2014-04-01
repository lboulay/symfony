<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dragoon\AdminBundle\Form\Type\User;

class UserController extends Controller
{
    public function formAction()
    {
        //$user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('DragoonAdminBundle:User')
                   ->find($this->getUser()->getId());
        
        $form = $this->get('form.factory')->create(new User(), $user);
        
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
                
                $em->persist($user);
                $em->flush();
            } else {
                $this->get('session')->getFlashBag()->add(
                        'error',
                        'Vos changements n\'ont pas été sauvegardés !'
                );
            }
        }
        
        return $this->render('DragoonAdminBundle:User:form.html.twig', array(
            'form' => $form->createView(),
            'title' => $form->getName()
        ));
    }
}
