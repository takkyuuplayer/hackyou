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

    public function testShowIndex()
    {
        $res = $this->get('/');

        $this->assertEquals(200, $res->getStatusCode());
    }
    public function testShow404()
    {
        $res = $this->get('/invalid/path');
        $this->assertEquals(404, $res->getStatusCode());
    }

    public function testShowSQLInjection()
    {
        $res = $this->get('/sql-injection/');
        $this->assertEquals(200, $res->getStatusCode());
    }
}
