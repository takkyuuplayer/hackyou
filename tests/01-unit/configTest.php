<?php
class ConfigTest extends PHPUnit_Framework_TestCase
{
    public function testGetHackmeDomain()
    {
        $this->assertEquals(
            'tp-hackme.herokuapp.com',
            \Hackyou\Config::getHackmeDomain()
        );

        putenv('HACKME_DOMAIN=subdomain.herokuapp.com');

        $this->assertEquals(
            'subdomain.herokuapp.com',
            \Hackyou\Config::getHackmeDomain()
        );
    }

    protected function tearDown()
    {
        putenv('HACKME_DOMAIN');
    }
}
