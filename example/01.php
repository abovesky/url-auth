<?php
require_once __DIR__.'/../vendor/autoload.php';

use abovesky\UrlAuth\Md5;

$urlAuth = new Md5('mysecretkey');

$signurl = $urlAuth->sign('http://localhost/tp5/public/api.php/index/hello', 3, 'minutes');
echo $signurl.'<br>';

var_dump($urlAuth->validate($signurl));