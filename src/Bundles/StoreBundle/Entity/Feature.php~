<?php

namespace Bundles\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feature
 */
class Feature
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;
    
    public function __construct() {
        $this->recipe = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Feature
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @var \Bundles\StoreBundle\Entity\Recipe
     */
    private $recipe;
    
    function __toString()
    {
        return $this->title?$this->title:'New';
    }
    /**
     * @var string
     */
    private $slug;


    /**
     * Set slug
     *
     * @param string $slug
     * @return Feature
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add recipe
     *
     * @param \Bundles\StoreBundle\Entity\Recipe $recipe
     * @return Feature
     */
    public function addRecipe(\Bundles\StoreBundle\Entity\Recipe $recipe)
    {
        $this->recipe[] = $recipe;

        return $this;
    }

    /**
     * Remove recipe
     *
     * @param \Bundles\StoreBundle\Entity\Recipe $recipe
     */
    public function removeRecipe(\Bundles\StoreBundle\Entity\Recipe $recipe)
    {
        $this->recipe->removeElement($recipe);
    }

    /**
     * Get recipe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecipe()
    {
        return $this->recipe;
    }
}
