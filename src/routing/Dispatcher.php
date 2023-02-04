<?php

namespace Yumerov\CredowebBackendTask\Routing;

use FastRoute\RouteCollector;
use Yumerov\CredowebBackendTask\Response\ResponseHandler;

class Dispatcher {
    public function __construct(private Router $router) { }

    public function dispatch()
    {
        $dispatcher = $this->registerRoutes();

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                break;
            case \FastRoute\Dispatcher::FOUND:
                list($class, $method) = $routeInfo[1];
                $vars = $routeInfo[2];
                $response = call_user_func_array([new $class(), $method], $vars);
                (new ResponseHandler())->handle($response);
        }
    }

    private function registerRoutes(): \FastRoute\Dispatcher
    {
        $routes = $this->router->parseRoutes();
        return \FastRoute\simpleDispatcher(function (RouteCollector $r) use ($routes) {
            foreach ($routes as $route) {
                $r->addRoute(
                    $route->getHttpMethod(),
                    $route->getRoute(),
                    $route->getHandler()
                );
            }
        });
    }
}