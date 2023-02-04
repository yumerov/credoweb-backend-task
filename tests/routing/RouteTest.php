<?php

namespace Yumerov\CredowebBackendTask\Routing;

use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase {

    public function testContructAndGetters()
    {
        // Arrange
        $verb = 'GET';
        $url = '/api/tests';
        $handler = ['Class', 'method'];

        // Act
        $route = new Route($verb, $url, $handler);

        // Assert
        $this->assertEquals($verb, $route->getHttpMethod());
        $this->assertEquals($url, $route->getRoute());
        $this->assertEquals($handler, $route->getHandler());
    }
}