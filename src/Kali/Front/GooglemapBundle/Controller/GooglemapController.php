<?php

namespace Kali\Front\GooglemapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AntiMattr\GoogleBundle\Maps\StaticMap;
use AntiMattr\GoogleBundle\Maps\Marker;


class GooglemapController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction()
    {
        // Add static map
        $googleContainer = $this->get('google.maps');

        $map = $googleContainer->createStaticMap();
        $map->setId('pageMap'.$page->getId())
            ->setSize('280x86');
        $marker = (new Marker)
            ->setLatitude($page->getLatitude())
            ->setLongitude($page->getLongitude());

        $map->addMarker($marker);

        $googleContainer->addMap($map);

        return array(
            'page' => $page,
        );
    }

}

