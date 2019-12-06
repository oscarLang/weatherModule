<?php
/**
 * Configuration file for request service.
 */
return [
    // Services to add to the container.
    "services" => [
        "weather" => [
            "shared" => true,
            "active" => true,
            "callback" => function () {
                $obj = new \Osln\Weather\Weather();
                $obj->setDI($this);
                return $obj;
            }
        ],
    ],
];
