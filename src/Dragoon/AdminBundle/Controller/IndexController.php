<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('DragoonAdminBundle:Index:index.html.twig');
    }
}
