<?php

namespace Kali\Front\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ClientController extends Controller {

    /**
     * @Route("/inscription", name="client_signin")
     * @Template()
     */
    public function signInAction() {
        return array(
        );
    }

    /**
     * @Route("/mon-compte", name="client_plug")
     * @Template()
     */
    public function plugAction() {
        return array(
                
        );
    }
    
    /**
     * @Route("/connexion", name="client_login")
     * @Template()
     */
    public function loginAction() {
        return array(
                
        );
    }
    
    /**
     * @Route("/deconnexion", name="client_logout")
     * @Template()
     */
    public function logoutAction() {
        return array(
                
        );
    }

}
