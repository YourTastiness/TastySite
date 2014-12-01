<?php

namespace Site\LocalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PhonesController extends Controller
{
    /**
     * @Route("/phones", name="main_phones")
     * @Template
     */

    public function indexAction()
    {
        $request = $this->get('request');
        $data['phone_id'] = $request->get('phone_id');
        $data['number'] = $request->get('number');
        
        $phonesManager = $this->container->get('store.phones_manager');
        $phones = $phonesManager->getData();
        
        return ['data' => $data,
                'phones' => $phones
                ];
    }
}
