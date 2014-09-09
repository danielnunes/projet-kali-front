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
     * @Route("/populaire", name="produit_popular")
     * @Template()
     */
    public function popularAction()
    {
        $products = array(); //recuperation des produits
        
        
        return array(
            'products' => $products,
        );
    }

}
