<?php

namespace Bundles\StoreBundle\Service;

//use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\HttpFoundation\Request;
//use Bundles\StoreBundle\Entity\Phones;
use Bundles\StoreBundle\Repository\PersonRepository;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class PersonManager
{
    /**
     * @var PersonRepository
     */
    protected $personRepo;  
    
    protected $container;
    
    public function __construct( PersonRepository $personRepo,
                                        Container $container)
    {
        $this->personRepo = $personRepo;
        $this->container = $container;
    }

    public function getData()
    {
        $request = $this->container->get('request');
        $fio = $request->get('fio');
        
        if( $fio != null && $fio != ''){
            return $this->personRepo->getPersonByFio($fio);
        }
        
        return null;
    }
}