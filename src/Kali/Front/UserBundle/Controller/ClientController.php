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
        /*  Création du client */
        
        
//        $client = new Client();
//
//        /* Création du formulaire */
//        $form = $this->createForm(new ClientUserFormType(), $user);
//
//        /* Récupération de la requête */
//        $request = $this->get('request');
//
//        if ($request->getMethod() == 'POST') {
//            $form->submit($request);
//
//            if ($form->isValid()) {
//                if($form->get("email")->getData()) {
//                    $user->setUsername($form->get("email")->getData());
//                }
//                if($form->get("plainPassword")->getData()) {
//                    $user->setPlainPassword($form->get("plainPassword")->getData());
//                }
//                if($request->get("email")) {
//                    $user->setPlainPassword($request->get("email"));
//                }
//                
//                $user->setEnabled(true);
//
//                $userManager->updateUser($user);
//                
//                if($form->get('client')->get("gender")) {
//                    $gender = $form->get('client')->get("gender")->getData();
//                    switch ($gender) {
//                        case 'm' :
//                            $client->setGender(false);
//                            break;
//                        case 'f' :
//                            $client->setGender(true);
//                            break;
//                    }
//                }
//                $client->setFirstName($form->get('client')->get('firstName')->getData());
//                $client->setAddress($form->get('client')->get('address')->getData());
//                $client->setLastName($form->get('client')->get('lastName')->getData());
//                $client->setPostalCode($form->get('client')->get('postalCode')->getData());
//                $client->setCity($form->get('client')->get('city')->getData());
//                $client->setMobilePhone($form->get('client')->get('mobilePhone')->getData());
//                $client->setPhone($form->get('client')->get('phone')->getData());
//                $date = new \DateTime('NOW');
//                $client->setCreateDate($date);
//
//                if($form->get('client')->get('birthDate')->getData()) {    
//                    $client->setBirthDate($form->get('client')->get('birthDate')->getData());
//                }
//                $client->setLastUpdateDate($date);
//                $client->setUser($user);
                
                
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
                if($response == null) {
                    
                }
                else {
                    
                }

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
        
       /*  Update du client  */
        
       $em = $this->getDoctrine()->getManager();
        /* @var $userManager UserManager */
        $userManager = $this->get('fos_user.user_manager');
//        $user = $userManager->findUserBy(array('id' => $id));
        $client = $em->getRepository("KaliBackUserBundle:Client")
                    ->findOneBy(array("id" => $id));
        $user = $client->getUser();

        /* Création du formulaire */
        $form = $this->createForm(new ClientUserEditFormType(), $client);
        $date = new \DateTime('NOW');
        /* Récupération de la requête */
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
//            $form->submit($request);
            $form->handleRequest($request);
            if ($form->isValid()) {
//                return new Response("ok");
                
                $user->setUsername($request->get("email"));
                $user->setEnabled($request->get("enabled"));
                $userManager->updateUser($user);
                
                if($form->get('client')->get("gender")) {
                    $gender = $form->get('client')->get("gender")->getData();
                    switch ($gender) {
                        case 'm' :
                            $client->setGender(false);
                            break;
                        case 'f' :
                            $client->setGender(true);
                            break;
                    }
                }
                $client->setFirstName($form->get('client')->get('firstName')->getData());
                $client->setAddress($form->get('client')->get('address')->getData());
                $client->setLastName($form->get('client')->get('lastName')->getData());
                $client->setPostalCode($form->get('client')->get('postalCode')->getData());
                $client->setCity($form->get('client')->get('city')->getData());
                $client->setMobilePhone($form->get('client')->get('mobilePhone')->getData());
                $client->setPhone($form->get('client')->get('phone')->getData());
                
                $date = new \DateTime('NOW');
                $client->setCreateDate($date);
                if($form->get('client')->get('birthDate')->getData()) {    
                    $client->setBirthDate($form->get('client')->get('birthDate')->getData());
                }

                $client->setLastUpdateDate($date);
                $client->setUser($user);
                
                $em->persist($client);
                $em->persist($user);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('notice', 'Utilisateur modifié avec succès');

                return $this->redirect($this->generateUrl('client.list'));
            }
        }
        return array('form' => $form->createView(), 'client' => $client);
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
