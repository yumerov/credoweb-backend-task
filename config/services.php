<?php

namespace Yumerov\CredowebBackendTask\Routing\Router;

use Yumerov\CredowebBackendTask\Response\ResponseHandler;
use Yumerov\CredowebBackendTask\Routing\Router;
use Yumerov\CredowebBackendTask\Routing\Dispatcher;
use Yumerov\CredowebBackendTask\DataLayer;

return [
    ResponseHandler::class => [],
    Router::class => [dirname(__DIR__)],
    Dispatcher::class => [Router::class, ResponseHandler::class],
    DataLayer::class => [dirname(__DIR__)]
];