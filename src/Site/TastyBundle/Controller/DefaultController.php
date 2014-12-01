<?php

namespace Site\TastyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SiteTastyBundle:Default:index.html.twig', array('name' => $name));
    }
}
