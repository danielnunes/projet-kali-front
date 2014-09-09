<?php

namespace Kali\Front\CommandBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testPopular()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/popular');
    }

}
