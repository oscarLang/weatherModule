<?php
/**
 * These routes are for demonstration purpose, to show how routes and
 * handlers can be created.
 */
return [
    // All routes in order
    "routes" => [
        [
            "info" => "Weather",
            "mount" => "weather",
            "handler" => "\Osln\Weather\WeatherController",
        ],
        [
            "info" => "Weather Json",
            "mount" => "jsonweather",
            "handler" => "\Osln\Weather\WeatherJsonController",
        ],
    ]
];
