<?php

namespace Osln\Weather;

class LoadConfig
{
    public function getKey($name)
    {
        $keys = require(ANAX_INSTALL_PATH . "/config/apikeys.php");
        return $keys[$name];
    }
}
