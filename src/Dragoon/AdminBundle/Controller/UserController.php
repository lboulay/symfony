<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function formAction()
    {
        return $this->render('DragoonAdminBundle:User:form.html.twig');
    }
}
