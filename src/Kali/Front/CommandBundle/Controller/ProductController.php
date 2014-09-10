<?php

namespace Kali\Front\CommandBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/produit")
 */
class ProductController extends Controller
{
    /**
     * @Route("/populaire", name="product_popular")
     * @Template()
     */
    public function popularAction()
    {
        $browser = new Browser();
        $response = $browser->get($this->container->getParameter("back_site") . 'feature/products');
        $products = $this->get('jms_serializer')->deserialize($response->getContent(), 'Doctrine\Common\Collections\ArrayCollection', 'json');
        return array(
            'products' => $products,
            'site' => $this->container->getParameter("back_site"),
        );
    }
    
    
    /**
     * @Route("/categorie/{id}", name="product_category")
     * @Template()
     */
    public function categoryAction()
    {
        $products = array(); //recuperation des produits
        
        
        return array(
            'products' => $products,
        );
    }
    
    /**
     * @Route("/produit/{id}", name="produit_plug")
     * @Template()
     */
    public function plugAction()
    {
        $products = array(); //recuperation des produits
        
        
        return array(
            'products' => $products,
        );
    }

}
