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
        $recipe = $this->get('store.recipe.repository')->findOneBy(['slug' => $slug]);
        
        if (is_null($recipe) || empty($recipe)) {
            throw $this->createNotFoundException('Запрашиваемая страница перемещена или удалена!');
        } else {
            return $this->render('SiteTastyBundle:Recipe:recipe.html.twig', ['recipe' => $recipe]); 
        }
    }
    
    /**
     * @Route("feature/{slug}", name="recipe_by_feature")
     */
    public function featureAction($slug) {
        
        $features = $this->get('store.feature.repository')->findAll();
        $feature = $this->get('store.feature.repository')->findOneBy(array('slug' => $slug));

        $recipe = $feature->getRecipe(); 
        
        if (is_null($recipe) || empty($recipe)) {
            throw $this->createNotFoundException('Запрашиваемая страница перемещена или удалена!');
        } else {
            return $this->render('SiteTastyBundle:Recipe:recipe2.html.twig', ['recipes' => $recipe, 'features' => $features]); 
        }
    }
    
}
