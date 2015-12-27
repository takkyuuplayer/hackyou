<?php
namespace Hackyou;

use Aptoma\Twig\Extension\MarkdownExtension;
use Aptoma\Twig\Extension\MarkdownEngine;

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

        $this->get('/sql-injection/', '\Hackyou\Controller\Root:showSQLInjection');

        $this->get('/csrf-01/', '\Hackyou\Controller\Csrf01:showIndex');
        $this->get('/csrf-01/iframe1', '\Hackyou\Controller\Csrf01:showIframe1');
        $this->get('/csrf-01/iframe2', '\Hackyou\Controller\Csrf01:showIframe2');

        $this->get('/csrf-02/', '\Hackyou\Controller\Csrf02:showIndex');
        $this->get('/csrf-02/iframe1', '\Hackyou\Controller\Csrf02:showIframe1');
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

            $engine = new MarkdownEngine\MichelfMarkdownEngine();
            $view->addExtension(new MarkdownExtension($engine));

            return $view;
        };

    }
}
