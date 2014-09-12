<?php

namespace Kali\Front\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Kali\Front\UserBundle\Entity\User;
use Kali\Front\UserBundle\Entity\Client;
use Kali\Front\UserBundle\Form\Type\ClientUserFormType;
use Symfony\Component\HttpFoundation\Response;
use Buzz\Browser;

class ClientController extends Controller {

    /**
     * @Route("/inscription", name="client_signin")
     * @Template("KaliFrontUserBundle:Client:new.html.twig")
     */
    public function signInAction() {
      
        $em = $this->getDoctrine()->getManager();
        
       $client = new Client();

        /* Création du formulaire */
        $form = $this->createForm(new ClientUserFormType($client));
        /*  Création du client */
        return array('form' => $form->createView());
//        return new Response("ok");

    }
    
    
    /**
     * 
     * @Route("/new-register/{id}", name = "new_register")
     * @Template()
     */
    public function newRegisterAction($id) {
        return $this->render("KaliFrontUserBundle:Client:new_register.html.twig", array("id" => $id));
    }

    /**
     * @Route("/mon-compte/{id}/{mess_bool}", name="client_plug")
     * @Template("KaliFrontUserBundle:Client:edit.html.twig")
     */
    public function plugAction($id, $mess_bool) {
        
        /* Take user */

        $browser = new Browser();
        $response = $browser->get($this->container->getParameter('back_site').'api/users/'.$id);
        $client = $this->get('jms_serializer')->deserialize($response->getContent(), 'Kali\Front\UserBundle\Entity\Client', 'json');
        if($mess_bool == 1) {
            $message = "Vos informations ont bien été modifiées";
        }
        else {
            $message = "";
        }
        return array(
            'client' => $client,
            "message" => $message,
        );

    }
    
    /**
     * @Route("/connexion/{mess}", name="client_login")
     * @Template()
     */
    public function loginAction($mess) {
        if($mess == 0) {
            $message = "Mauvais mot de passe ou identifiants";
        }
        else {
            $message = "";
        }
        return $this->render("KaliFrontUserBundle:Client:login.html.twig", array("message" => $message,));
            
    }
    
    /**
     * @Route("/check_login/{id}", name="check_login")
     * @Template()
     */
    public function checkLoginAction($id) {
        $em = $this->getDoctrine()->getManager();

        $browser = new Browser();
        $response = $browser->get($this->container->getParameter('back_site').'api/users/'.$id);
        $client = $this->get('jms_serializer')->deserialize($response->getContent(), 'Kali\Front\UserBundle\Entity\Client', 'json');
//        var_dump($client);
        if($client) {
            $session = $this->container->get('session');
            $session->set('client', $client);
            $mess_bool = 0;
            return $this->redirect($this->generateUrl('client_plug', array('id' => $client->getId(), 'mess_bool' => $mess_bool)));
        }              
        return new Response("ok");
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
