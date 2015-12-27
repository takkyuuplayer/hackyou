<?php

namespace Hackyou\Controller;

class Csrf01 extends \Hackyou\Controller
{
    public function showIndex($request, $response)
    {
        $this->container->view->render($response, 'csrf-01/index.html.twig', [
        'domain' => \Hackyou\Config::getHackmeDomain(),
        ]);
        return $response;
    }
    public function showIframe1($request, $response)
    {
        $this->container->view->render($response, 'csrf-01/iframe1.html.twig', [
        'domain' => \Hackyou\Config::getHackmeDomain(),
        ]);
        return $response;
    }
    public function showIframe2($request, $response)
    {
        $this->container->view->render($response, 'csrf-01/iframe2.html.twig', [
        'domain' => \Hackyou\Config::getHackmeDomain(),
        ]);
        return $response;
    }
}
