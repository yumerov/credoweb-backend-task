<?php

namespace Yumerov\CredowebBackendTask\Routing\Router;

use Yumerov\CredowebBackendTask\Response\ResponseHandler;
use Yumerov\CredowebBackendTask\Routing\Router;
use Yumerov\CredowebBackendTask\Routing\Dispatcher;

return [
    ResponseHandler::class => [],
    Router::class => [dirname(__DIR__)],
    Dispatcher::class => [Router::class, ResponseHandler::class],
];