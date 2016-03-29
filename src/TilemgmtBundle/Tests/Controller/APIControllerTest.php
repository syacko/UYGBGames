<?php

namespace TilemgmtBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APIControllerTest extends WebTestCase
{
    public function testIsbuildable()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/isBuildable');
    }

    public function testMarkunbuildable()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/markUnbuildable');
    }

}
