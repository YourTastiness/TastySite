<?php

namespace Bundles\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recipe
 */
class Recipe
{
    const IMAGE_BASEPATH = 'img/uploads/recipe/';
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
     * @var string
     */
    private $image;
    
    private $imageFile;

    /**
     * @var string
     */
    private $content;
    
    /**
     * @var boolean
     */
    private $is_active;

    private $category;
    
    private $features;
    
    
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
     * @return Recipe
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
     * @return Recipe
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
     * Set image
     *
     * @param string $image
     * @return Recipe
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

        /**
     * Set imageFile
     *
     * @param string $image
     * @return Recipe
     */
    public function setImageFile($image)
    {
        $this->imageFile = $image;

        return $this;
    }

    /**
     * Get imageFile
     *
     * @return string 
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
    /**
     * Set content
     *
     * @param string $content
     * @return Recipe
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Recipe
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
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
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set category
     *
     * @param \Bundles\StoreBundle\Entity\Category $category
     * @return Recipe
     */
    public function setCategory(\Bundles\StoreBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Bundles\StoreBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add features
     *
     * @param \Bundles\StoreBundle\Entity\Feature $features
     * @return Recipe
     */
    public function addFeature(\Bundles\StoreBundle\Entity\Feature $features)
    {
        $this->features[] = $features;

        return $this;
    }

    /**
     * Remove features
     *
     * @param \Bundles\StoreBundle\Entity\Feature $features
     */
    public function removeFeature(\Bundles\StoreBundle\Entity\Feature $features)
    {
        $this->features->removeElement($features);
    }

    /**
     * Get features
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeatures()
    {
        return $this->features;
    }
}
