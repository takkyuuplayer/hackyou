<?php
namespace Hackyou;

class App extends \Slim\App
{
    public function __construct($container = [])
    {
        parent::__construct($container);

        $this->setUpRoutes();
        $this->setupRenderer();
    }
    public function setUpRoutes()
    {
        $this->get('/', '\Hackyou\Controller\Root:showIndex');
    }
    public function setupRenderer()
    {
        $container = $this->getContainer();
        $container['view'] = function ($c) {
            $view = new \Slim\Views\Twig(ROOT_DIR . '/resources/views', [
            'cache' => ROOT_DIR . '/resources/cache/twig',
            'debug' => true,
            'auto_reload' => true,
            ]);

            $view->addExtension(new \Slim\Views\TwigExtension(
                $c['router'],
                $c['request']->getUri()
            ));

            return $view;
        };

    }
}
