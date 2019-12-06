<?php
/**
 * Configuration file for request service.
 */
return [
    // Services to add to the container.
    "services" => [
        "curl" => [
            "shared" => true,
            "active" => true,
            "callback" => function () {
                $obj = new \Osln\Weather\CurlRequest();
                return $obj;
            }
        ],
    ],
];
