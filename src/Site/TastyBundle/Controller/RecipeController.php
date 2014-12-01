<?php

namespace Site\TastyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RecipeController extends Controller
{


    /**
     * @Route("recipe/{slug}", name="recipe_page")
     */
    public function recipeAction($slug) {
        $recipe = $this->getDoctrine()->getManager()->getRepository('Bundles\StoreBundle\Entity\Recipe')->findOneBy(array('slug' => $slug));
        
        if (is_null($recipe) || empty($recipe)) {
            throw $this->createNotFoundException('Запрашиваемая страница перемещена или удалена!');
        } else {
            return $this->render('SiteTastyBundle:Recipe:recipe.html.twig', array('recipe' => $recipe)); 
        }
    }
    
    /**
     * @Route("feature/{slug}", name="recipe_by_feature")
     */
    public function featureAction($slug) {
        
        $features = $this->getDoctrine()->getManager()->getRepository('Bundles\StoreBundle\Entity\Feature')->findAll();
        $feature = $this->getDoctrine()->getManager()->getRepository('Bundles\StoreBundle\Entity\Feature')->findOneBy(array('slug' => $slug));

        $recipe = $this->getDoctrine()->getManager()->getRepository('Bundles\StoreBundle\Entity\Recipe')->findBy(['features' => [$feature]]);      
        
        if (is_null($recipe) || empty($recipe)) {
            throw $this->createNotFoundException('Запрашиваемая страница перемещена или удалена!');
        } else {
            return $this->render('SiteTastyBundle:Recipe:recipe2.html.twig', array('recipes' => $recipe, 'features' => $features)); 
        }
    }
    
}
