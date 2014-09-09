<?php

namespace Kali\Front\CommandBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProducctControllerTest extends WebTestCase
{
    public function testPopular()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/popular');
    }

    public function testBycategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/category/{name}');
    }

}
