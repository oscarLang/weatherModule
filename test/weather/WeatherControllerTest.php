<?php

namespace Osln\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class WeatherControllerTest extends TestCase
{
    protected function setUp()
    {
        global $di;

        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");
        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // $di->setShared("weather", "Osln\Weather\WeatherMock");

        // View helpers uses the global $di so it needs its value
        $this->di = $di;
        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }
    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {

        $res = $this->controller->indexAction();

        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }

    public function testResponseAction()
    {
        // Setup the controller
        // var_dump($this->di);
        $req = $this->di->get("request");
        $req->setGet("location", "158.174.29.41");

        $res = $this->controller->responseActionGet();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);

        $req->setGet("location", "Kalmar");

        $res = $this->controller->responseActionGet();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }

    public function testPreviousAction()
    {
        // Setup the controller
        // var_dump($this->di);
        $req = $this->di->get("request");
        $req->setGet("location", "158.174.29.41");

        $res = $this->controller->previousActionGet();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);

        $req->setGet("location", "Kalmar");

        $res = $this->controller->previousActionGet();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }
}
