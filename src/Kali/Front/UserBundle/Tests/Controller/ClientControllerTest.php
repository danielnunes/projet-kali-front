<?php

namespace Kali\Front\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientControllerTest extends WebTestCase
{
    public function testSignin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/signIn');
    }

    public function testPlug()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/plug');
    }

}
