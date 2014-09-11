<?php

namespace Kali\Front\CommandBundle\Controller;

use Buzz\Browser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        $response = $browser->get($this->container->getParameter("back_site") . 'api/feature/products');
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
    public function categoryAction($id)
    {
        $browser = new Browser();
        $response = $browser->get($this->container->getParameter("back_site") . 'categories/' . $id . '/product');
        $products = $this->get('jms_serializer')->deserialize($response->getContent(), 'Doctrine\Common\Collections\ArrayCollection', 'json');
        return array(
            'products' => $products,
            'site' => $this->container->getParameter("back_site"),
        );
    }
    
    /**
     * @Route("/produit/{id}", name="product_plug")
     * @Template()
     */
    public function plugAction($id)
    {
        $browser = new Browser();
        $response = $browser->get($this->container->getParameter("back_site") . 'api/products/' . $id);
        $product = $this->get('jms_serializer')->deserialize($response->getContent(), 'Kali\Front\CommandBundle\Entity\Product', 'json');

        return array(
            'product' => $product,
            'site' => $this->container->getParameter("back_site"),
            'caracteristics' => $product->getCaracteristics(),
        );
    }

}
