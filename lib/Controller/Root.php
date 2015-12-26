<?php

namespace Hackyou\Controller;

class Root
{
    public function showIndex($request, $response)
    {
        $response->write('Hello /');
        return $response;
    }
}
