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
        $products = array(); //recuperation des produits
        
        
        return array(
            'products' => $products,
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
