<?php

namespace Site\LocalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteLocalBundle:Main:index.html.twig');
    }
}
