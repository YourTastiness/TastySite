<?php

namespace Site\LocalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PersonController extends Controller
{
    /**
     * @Route("/persons", name="main_persons")
     * @Template
     */
    public function indexAction()
    {
        $request = $this->get('request');
        $data['fio'] = $request->get('fio');
        
        $personManager = $this->container->get('store.person_manager');
        $persons = $personManager->getData();
        
        return ['data' => $data,
                'persons' => $persons
                ];
    }
    
    /**
     * @Route("/person/{id}", name="one_person")
     * @Template
     */
    public function personAction($id)
    {
        $personRepo = $this->container->get('store.person.repository');
        $person = $personRepo->find($id);
        return ['person' => $person
                ];
    }
    
    /**
     * @Template
     */
    public function listAllAction()
    {
        $personRepo = $this->container->get('store.person.repository');
        $persons = $personRepo->findAll();
        return ['persons' => $persons];
    }
}
