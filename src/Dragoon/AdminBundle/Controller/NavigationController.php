<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NavigationController extends Controller
{
    public function headerAction($max = 3)
    {
        return $this->render('DragoonAdminBundle:Navigation:header.html.twig');
    }
    
    public function sideAction($max = 3)
    {
        return $this->render('DragoonAdminBundle:Navigation:side.html.twig');
    }
}
