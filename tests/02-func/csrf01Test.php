<?php

use Slim\Http\Body;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\RequestBody;
use Slim\Http\Response;
use Slim\Http\Uri;

class RoutesTest extends PHPUnit_Framework_TestCase
{

    public function request($method, $path, $options = array())
    {
        $env = Environment::mock(array_merge([
        'SCRIPT_NAME' => '/index.php',
        'REQUEST_URI' => $path,
        'REQUEST_METHOD' => $method,
        ], $options));
        $uri = Uri::createFromEnvironment($env);
        $headers = Headers::createFromEnvironment($env);
        $cookies = [];
        $serverParams = $env->all();
        $body = new RequestBody();
        $req = new Request($method, $uri, $headers, $cookies, $serverParams, $body);
        $res = new Response();

        $app = require ROOT_DIR . '/bootstrap/bootstrap.php';
        $app($req, $res);

        return $app($req, $res);
    }

    public function get($path, $options = array())
    {
        return $this->request('GET', $path, $options);
    }

    public function testShowIframe1()
    {
        $res = $this->get('/csrf-01/iframe1');

        $this->assertEquals(200, $res->getStatusCode());
    }
    public function testShowIframe2()
    {
        $res = $this->get('/csrf-01/iframe2');

        $this->assertEquals(200, $res->getStatusCode());
    }
    public function testShowIndex()
    {
        $res = $this->get('/csrf-01/');

        $this->assertEquals(200, $res->getStatusCode());
    }
}
