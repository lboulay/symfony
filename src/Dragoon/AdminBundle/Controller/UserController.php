<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dragoon\AdminBundle\Form\Type\User;

class UserController extends Controller
{
    public function formAction()
    {
        $form = $this->get('form.factory')->create(new User());
        
        return $this->render('DragoonAdminBundle:User:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
