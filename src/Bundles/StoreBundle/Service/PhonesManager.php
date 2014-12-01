<?php

namespace Bundles\StoreBundle\Service;

//use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\HttpFoundation\Request;
//use Bundles\StoreBundle\Entity\Phones;
use Bundles\StoreBundle\Repository\PhonesRepository;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class PhonesManager
{
    /**
     * @var PhonesRepository
     */
    protected $phonesRepo;  
    
    protected $container;
    
    public function __construct( PhonesRepository $phonesRepo,
                                        Container $container)
    {
        $this->phonesRepo = $phonesRepo;
        $this->container = $container;
    }

    public function getData()
    {
        $request = $this->container->get('request');
        $id = $request->get('phone_id');
        $number = $request->get('number');
        
        if(($id != null && $id != '') && ($number != null && $number != '')){
            return $this->phonesRepo->getPhonesByNumberAndId($number,$id);
        }
            
        if($id != null && $id != ''){
            return $this->phonesRepo->findBy(['phone_id' => $id]);
        }
        
        if($number != null && $number != ''){
            return $this->phonesRepo->getPhonesByNumber($number);
        }
        
        return null;
    }
}