<?php

namespace Yumerov\CredowebBackendTask\Routing;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{

    public function testParseRoutes()
    {
        // Arrange
        $ds = DIRECTORY_SEPARATOR;
        $rootDir = dirname(__DIR__) . "{$ds}data";
        $routes = require("{$rootDir}{$ds}config{$ds}routes.php");
        $verb = $routes[0][0];
        $url = $routes[0][1];
        $handler = $routes[0][2];
        $router = new Router($rootDir);

        // Act
        $parsedRoutes = $router->parseRoutes();

        // Assert
        $this->assertEquals(1, count($parsedRoutes));
        $this->assertEquals($verb, $parsedRoutes[0]->getHttpMethod());
        $this->assertEquals($url, $parsedRoutes[0]->getRoute());
        $this->assertEquals($handler, $parsedRoutes[0]->getHandler());
    }
}