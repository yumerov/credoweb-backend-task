<?php

namespace Yumerov\CredowebBackendTask\Routing;

class Router {

    public function __construct(private string $rootDir) { }

    /**
     * @return Route[]
     */
    public function parseRoutes(): array
    {
        $ds = DIRECTORY_SEPARATOR;
        $routes = require("{$this->rootDir}{$ds}config{$ds}routes.php");

        return array_map(function ($route) {
            return new Route($route[0], $route[1], $route[2]);
        }, $routes);
    }
}