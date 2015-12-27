<?php

namespace Hackyou\Controller;

class Root extends \Hackyou\Controller
{
    public function showIndex($request, $response)
    {
        $this->container->view->render($response, 'root.html.twig');
        return $response;
    }

    public function showSQLInjection($request, $response)
    {
        $this->container->view->render($response, 'sql-injection.html.twig');
        return $response;
    }
}
