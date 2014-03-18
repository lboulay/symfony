<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    public function loginAction()
    {
        return $this->render('DragoonAdminBundle:Login:index.html.twig');
    }
}
