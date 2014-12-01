<?php

namespace Site\LocalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PaymentController extends Controller
{
    /**
     * @Route("/systems", name="main_payment")
     * @Template
     */
    public function indexAction()
    {
        $request = $this->get('request');
        $data['payment_system'] = $request->get('payment_system');
        
        $paymentRepo = $this->container->get('store.payment_system.repository');
        $systems = $paymentRepo->findAll();
        
        return ['data' => $data,
                'paymentSystems' => $systems
                ];
    }
    
    /**
     * @Route("/paymentsystem/{id}", name="one_paymentsystem")
     * @Template
     */
    public function paymentAction($id)
    {
        $paymentRepo = $this->container->get('store.payment_system.repository');
        $payment = $paymentRepo->find($id);
        return ['paymentSystem' => $payment
                ];
    }
    
}
