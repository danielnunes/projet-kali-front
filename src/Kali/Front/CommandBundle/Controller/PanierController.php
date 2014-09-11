<?php

namespace Kali\Front\CommandBundle\Controller;

use Buzz\Browser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/panier")
 */
class PanierController extends Controller {

    /**
     * @Route("/list", name="panier_list")
     * @Template()
     */
    public function listAction() {
        $session = new Session();
        $session->start();
        $panier = $session->get("panier");
        $total = $session->get("totalPanier");
        $lenghtPanier = $session->get("lenghtPanier");
        $weightPanier = $session->get("weightPanier");
        $browser = new Browser();
        $response = $browser->get($this->container->getParameter("back_site") . 'api/senders/' . $lenghtPanier . 'weights/' . $weightPanier);
        $sender = $this->get('jms_serializer')->deserialize($response->getContent(), 'Kali\Front\CommandBundle\Entity\Sender', 'json');
        
        return array(
                'panier' => $panier,
                'total' => $total,
                'sender' => $sender,
        );
    }

    /**
     * @Route("/add/{id}", name="panier_add")
     * @Template()
     */
    public function addAction($id) {
        $browser = new Browser();
        $response = $browser->get($this->container->getParameter("back_site") . 'api/products/' . $id);
        $product = $this->get('jms_serializer')->deserialize($response->getContent(), 'Kali\Front\CommandBundle\Entity\Product', 'json');

        $dimension = array($product->getLenght(), $product->getDensity(), $product->getWidth());
        $lenghtProduct = max($dimension);
        
        $session = new Session();
        $session->start();
        $panier = $session->get("panier");
        $total = $session->get("totalPanier");
        $lenghtPanier = $session->get("lenghtPanier");
        $weightPanier = $session->get("weightPanier");
        
        
       if($product->getEcoParticipation() == 1){
           $price = $product->getPrice() + (0.51 * $product->getWeight());
       } else{ 
           $price = $product->getPrice();
       }
       
        if(!isset($panier[$id])){
            $elementPanier['product'] = $product;
            $elementPanier['quantity'] = 1;
            $elementPanier['price'] = $price;
            $panier[$id] = $elementPanier;
        } else {
            $panier[$id]['quantity'] += 1;
            $panier[$id]['price'] += $price;
        }
        
        if($total > 0 ){
            $total += $price;
        } else {
            $total = $price;
        }
        
        if($lenghtPanier > 0 ){
            $lenghtPanier += $lenghtProduct;
        } else {
            $lenghtPanier = $lenghtProduct;
        }
        
        if($weightPanier > 0 ){
            $weightPanier += $product->getWeight();
        } else {
            $weightPanier = $product->getWeight();
        }
        
        $session->set("panier", $panier);
        $session->set("totalPanier", $total);
        $session->set("lenghtPanier", $lenghtPanier);
        $session->set("weightPanier", $weightPanier);
        
        return $this->redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * @Route("/delete/{id}", name="panier_delete")
     * @Template()
     */
    public function deleteAction($id) {
        $browser = new Browser();
        $response = $browser->get($this->container->getParameter("back_site") . 'api/products/' . $id);
        $product = $this->get('jms_serializer')->deserialize($response->getContent(), 'Kali\Front\CommandBundle\Entity\Product', 'json');

        $dimension = array($product->getLenght(), $product->getDensity(), $product->getWidth());
        $lenghtProduct = max($dimension);
        
        $session = new Session();
        $session->start();
        $panier = $session->get("panier");
        $total = $session->get("totalPanier");
        $lenghtPanier = $session->get("lenghtPanier");
        $weightPanier = $session->get("weightPanier");
        
       if($product->getEcoParticipation() == 1){
           $price = $product->getPrice() + (0.51 * $product->getWeight());
       } else{ 
           $price = $product->getPrice();
       }
        
        $elementPanier = $panier[$id];
        $elementPanier['quantity'] += (-1);
        $elementPanier['price'] += (-$price);
        
        $total += (-$price);
        $lenghtPanier += (-$lenghtProduct);
        $weightPanier += (-$product->getWeight());
        
        $panier[$id] = $elementPanier;
        if($panier[$id]['quantity'] == 0){
            unset($panier[$id]);
        }
        $session->set("panier", $panier);
        $session->set("totalPanier", $total);
        $session->set("lenghtPanier", $lenghtPanier);
        $session->set("weightPanier", $weightPanier);
        return $this->redirect($_SERVER['HTTP_REFERER']);
    }
    
    /**
     * @Route("/min", name="panier_min")
     * @Template()
     */
    public function minAction() {
        $session = new Session();
        $session->start();
        $panier = $session->get("panier");
        $total = $session->get("totalPanier");
        return array(
            'panier' => $panier,
            'totalPanier' => $total,
        );
    }

}
