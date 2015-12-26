<?php

namespace Hackyou;

class Controller
{

    protected $request;
    protected $response;
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
}
