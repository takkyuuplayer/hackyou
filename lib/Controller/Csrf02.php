<?php

namespace Hackyou\Controller;

class Csrf02 extends \Hackyou\Controller
{
    public function showIndex($request, $response)
    {
        $this->container->view->render($response, 'csrf-02/index.html.twig', [
        'domain' => \Hackyou\Config::getHackmeDomain(),
        ]);
        return $response;
    }
    public function showIframe1($request, $response)
    {
        $this->container->view->render($response, 'csrf-02/iframe1.html.twig', [
        'domain' => \Hackyou\Config::getHackmeDomain(),
        ]);
        return $response;
    }
}
