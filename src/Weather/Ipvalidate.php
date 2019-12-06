<?php

namespace Osln\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class Ipvalidate
{
    public function __construct()
    {
        $this->config = new LoadConfig();
    }
    public function getUrl($search)
    {
        $url = null;
        $key = null;
        if (filter_var($search, FILTER_VALIDATE_IP)) {
            $key = $this->config->getKey("ipstack");
            $url = "http://api.ipstack.com/%2\$s?access_key=%1\$s";
        } else {
            $url = "http://open.mapquestapi.com/nominatim/v1/search.php?q=%2\$s&limit=1&format=json&key=%1\$s";
            $key = $this->config->getKey("mapquest");
        }
        $urlFinal = sprintf($url, $key, $search);
        return $urlFinal;
    }
}
