<?php

namespace Osln\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class WeatherJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;
    public function initialize() : void
    {
        $this->config = new LoadConfig();
        $this->ipvalidate = new Ipvalidate();
    }
    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     *
     * @return string
     */
    public function indexAction() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");

        $data = [
            "title" => "Väder",
            "forecast" => $session->has("forecast") ? $session->get("forecast") : "",
            "month" => $session->has("month") ? $session->get("month") : "",
            "error" => $session->has("error") ? $session->get("error") : "",
            "location" => "",
        ];
        $page->add("osln/weather/defaultJson", $data);
        $session->delete("error");
        return $page->render();
    }

    public function responseActionGet()
    {
        $search = $this->di->request->getGet("location");
        $session = $this->di->get("session");
        $session->delete("month");
        $url = $this->ipvalidate->getUrl($search);

        $data = $this->di->curl->fetch($url);
        // $forecast = null;

        if (isset($data["latitude"])) {
            $forecast = $this->di->weather->forecast($data["latitude"], $data["longitude"]);
        } elseif (isset($data[0]["lat"])) {
            $forecast = $this->di->weather->forecast($data[0]["lat"], $data[0]["lon"]);
        } else {
            return [["Could not find this location"]];
        }
        $data = [];
        $i = 1;
        // var_dump($forecast);
        foreach ($forecast[0]["daily"]["data"] as $day) {
            $newDay = [
                "day" => $i++,
                "summary" => $day["summary"],
                "temp" => $day["temperatureHigh"],
                "wind" => $day["windSpeed"]];
            $data[] = $newDay;
        }
        return [$data];
    }
    public function previousActionGet()
    {
        $search = $this->di->request->getGet("location");
        $url = $this->ipvalidate->getUrl($search);

        $data = $this->di->curl->fetch($url);
        $forecast = null;
        if (isset($data["latitude"])) {
            $forecast = $this->di->weather->forecast($data["latitude"], $data["longitude"]);
            $month = $this->di->weather->getLastMonth($data["latitude"], $data["longitude"]);
        } elseif (isset($data[0]["lat"])) {
            $forecast = $this->di->weather->forecast($data[0]["lat"], $data[0]["lon"]);
            $month = $this->di->weather->getLastMonth($data[0]["lat"], $data[0]["lon"]);
        }
        $data = [];
        $i = -1;
        foreach ($month[0] as $day) {
            $newDay = [
                "day" => $i++,
                "summary" => $day["daily"]["data"][0]["summary"],
                "temp" => $day["daily"]["data"][0]["temperatureHigh"],
                "wind" => $day["daily"]["data"][0]["windSpeed"]
            ];
            $data[] = $newDay;
        }
        return [$data];
    }
}
