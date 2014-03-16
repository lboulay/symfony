<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        return $this->render('DragoonAdminBundle:Login:index.html.twig');
    }
}
