<?php

namespace Site\LocalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SiteLocalBundle:Default:index.html.twig', array('name' => $name));
    }
}
