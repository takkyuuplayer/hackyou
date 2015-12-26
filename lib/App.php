<?php
namespace Hackyou;

class App extends \Slim\App
{
    public function __construct($container = [])
    {
        parent::__construct($container);

        $this->setUpRoutes();
    }
    public function setUpRoutes()
    {
        $this->get('/', '\Hackyou\Controller\Root:showIndex');
    }
}
