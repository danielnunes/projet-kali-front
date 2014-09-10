<?php

namespace Kali\Front\SiteBundle\Controller;

use Buzz\Browser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index_index")
     * @Template()
     */
    public function indexAction()
    {
        $browser = new Browser();
        $response = $browser->get($this->container->getParameter("back_site") . 'sliders');
        $sliders = $this->get('jms_serializer')->deserialize($response->getContent(), 'Doctrine\Common\Collections\ArrayCollection', 'json');
        return array(
            'sliders' => $sliders,
            'site' => $this->container->getParameter("back_site"),
        );
    }

}
