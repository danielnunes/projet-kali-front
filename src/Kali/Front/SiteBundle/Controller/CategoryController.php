<?php

namespace Kali\Front\SiteBundle\Controller;

use Buzz\Browser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    /**
     * @Route("/category/list", name="category_list")
     * @Template()
     */
    public function listAction()
    {
        $browser = new Browser();
        $response = $browser->get($this->container->getParameter("back_site") . 'api/all/category');
        $categories = $this->get('jms_serializer')->deserialize($response->getContent(), 'Doctrine\Common\Collections\ArrayCollection', 'json');
        return array(
               "categories"  => $categories,
            );    
        
    }

}
