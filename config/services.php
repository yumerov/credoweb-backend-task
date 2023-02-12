<?php

namespace Yumerov\CredowebBackendTask\Routing\Router;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Yumerov\CredowebBackendTask\Controller\HospitalController;
use Yumerov\CredowebBackendTask\Controller\UserController;
use Yumerov\CredowebBackendTask\Response\ResponseHandler;
use Yumerov\CredowebBackendTask\Routing\Router;
use Yumerov\CredowebBackendTask\Routing\Dispatcher;
use Yumerov\CredowebBackendTask\DataLayer;
use Yumerov\CredowebBackendTask\Service\HospitalService;
use Yumerov\CredowebBackendTask\Service\UserService;

return [
    ResponseHandler::class => [],
    Router::class => [dirname(__DIR__)],
    Dispatcher::class => [Router::class, ResponseHandler::class],
    DataLayer::class => [dirname(__DIR__)],

    HospitalService::class => [EntityManager::class],
    HospitalController::class => [HospitalService::class],

    UserService::class => [EntityManager::class],
    UserController::class => [UserService::class],
];