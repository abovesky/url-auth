<?php

namespace abovesky\UrlAuth\Tests;

use abovesky\UrlAuth\Md5;
use ReflectionMethod;

class Md5Test extends TestCase
{
    public function testCreateSignature()
    {
        $fixture = new Md5('bar_sign');
        $reflector = new ReflectionMethod(Md5::class, 'createSignature');
        $createSignature = $reflector->getClosure($fixture);
        $res = call_user_func_array($createSignature, ['foo_url', 'foo_expiration']);

        $md5 = 'e805cbe1ec79a0388707bb71b0ca4e67';// md5('foo_url::foo_expiration::bar_sign');

        $this->assertEquals($res, $md5);
    }
}
