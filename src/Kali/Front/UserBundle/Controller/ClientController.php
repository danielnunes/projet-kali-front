<?php

namespace Kali\Front\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Kali\Back\UserBundle\Entity\User;
use Buzz\Browser;

class ClientController extends Controller {

    /**
     * @Route("/inscription", name="client_signin")
     * @Template()
     */
    public function signInAction() {
        /* @var $userManager UserManager */
        $em = $this->getDoctrine()->getManager();
        
        $roles = array_keys($this->container->getParameter('security.role_hierarchy.roles'));
        $user = new User();
        /* Création du formulaire */
        $form = $this->createForm(new UserFormType($roles), $user);

        /* Récupération de la requête */
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->submit($request);
            if ($form->isValid()) {
                $user->setUsername($form->get("email")->getData());
                $user->setPlainPassword($form->get("plainPassword")->getData());
                $user->setEnabled(true);
                $user_json = json_encode($user);
                
                $browser = new Browser();
                $response = $browser->get($this->container->getParameter('back_site').'create-user/user='.$user_json); 
                $response->getContent();
                $response = json_decode($response);
                

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('notice', 'Utilisateur créé avec succès');

                return $this->redirect($this->generateUrl('user.list'));
            }
        }
        return array('form' => $form->createView());
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
