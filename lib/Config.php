<?php
namespace Hackyou;

class Config
{
    public static function getHackmeDomain()
    {
        if (! getenv('HACKME_DOMAIN')) {
            return 'tp-hackme.herokuapp.com';
        }
        return getenv('HACKME_DOMAIN');
    }
}
