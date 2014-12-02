<?php

namespace Site\TastyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{

    public function homepageAction()
    {   $recipes = $this->get('store.recipe.repository')->findBy(array('is_active' => true));
        $features = $this->get('store.feature.repository')->findAll();
        return $this->render('SiteTastyBundle:Main:index.html.twig', ['recipes' => $recipes , 'features' => $features]);
    }

    public function staticPageAction($slug) {
        $page = $this->getDoctrine()->getManager()->getRepository('Site\TastyBundle\Entity\StaticPage')->findOneBy(array('slug' => $slug));
        
        if (is_null($page) || empty($page)) {
            throw $this->createNotFoundException('Запрашиваемая страница перемещена или удалена!');
        } else {
            return $this->render('SiteTastyBundle:Main:static.html.twig', array('page' => $page)); 
        }
    }
    
}
