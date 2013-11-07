<?php

namespace Petramas\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    private function getHostUrl($hostId, $path = '')
    {
        return self::$kernel->getContainer()->getParameter('petramas.test.hostname.'.$hostId).$path;
    }
    
    public function testIndex()
    {
        $client = static::createClient(array('test', true), array(
            'PHP_AUTH_USER' => 'jose',
            'PHP_AUTH_PW'   => 'jose',
        ));
        $crawler = $client->request('GET', $this->getHostUrl('local', '/'));

        $this->assertTrue($crawler->filter('html:contains("Bienvenido")')->count() > 0);
    }
}
