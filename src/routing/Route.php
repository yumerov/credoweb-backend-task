<?php

namespace Yumerov\CredowebBackendTask\Routing;

class Route {

    public function __construct(
        private string $httpMethod,
        private string $route,
        private $handler
    ) { }

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getHandler()
    {
        return $this->handler;
    }
}