<?php

namespace Bundles\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="Recipe", mappedBy="category")
     */
    private $recipes;


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
     * @return Category
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
     * Set slug
     *
     * @param string $slug
     * @return Category
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
     * Set recipes
     *
     * @param integer $recipes
     * @return Category
     */
    public function setRecipes($recipes)
    {
        $this->recipes = $recipes;

        return $this;
    }

    /**
     * Get recipes
     *
     * @return integer 
     */
    public function getRecipes()
    {
        return $this->recipes;
    }
    
    function __toString()
    {
        return $this->title?$this->title:'New';
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recipes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add recipes
     *
     * @param \Bundles\StoreBundle\Entity\Recipe $recipes
     * @return Category
     */
    public function addRecipe(\Bundles\StoreBundle\Entity\Recipe $recipes)
    {
        $this->recipes[] = $recipes;

        return $this;
    }

    /**
     * Remove recipes
     *
     * @param \Bundles\StoreBundle\Entity\Recipe $recipes
     */
    public function removeRecipe(\Bundles\StoreBundle\Entity\Recipe $recipes)
    {
        $this->recipes->removeElement($recipes);
    }
}
