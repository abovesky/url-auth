<?php

namespace abovesky\UrlAuth\Tests;

use abovesky\UrlAuth\Base;

class BaseTest extends TestCase
{
    public function testConstructException()
    {
        $this->expectExceptionMessage('The signature key is empty');

        $bar = new Bar('');
    }

    public function testConstruct()
    {
        $bar = new Bar('foo_key');

        $this->assertEquals($bar->getSignatureKey(), 'foo_key');
        $this->assertEquals($bar->getExpiresParameter(), 'expires');
        $this->assertEquals($bar->getSignatureParameter(), 'signature');

        $bar = new Bar('foo_key2', 'foo_expires', 'foo_param');

        $this->assertEquals($bar->getSignatureKey(), 'foo_key2');
        $this->assertEquals($bar->getExpiresParameter(), 'foo_expires');
        $this->assertEquals($bar->getSignatureParameter(), 'foo_param');
    }
}

class Bar extends Base
{

}