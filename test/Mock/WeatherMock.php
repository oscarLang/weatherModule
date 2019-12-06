<?php

namespace Osln\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class WeatherMock extends Weather implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;
    public function __construct()
    {
        $this->config = new LoadConfig();
    }
    public function forecast($lat, $lon) : array
    {
        $data = file_get_contents("forecast.json");
        return [json_decode($data)];
        echo "tsesfart";
        // return [$data];
    }

    public function getLastMonth($lat, $lon) : array
    {
        $data = file_get_contents("historic.json");
        return [json_decode($data)];
    }
}
