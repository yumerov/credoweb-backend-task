<?php

use Yumerov\CredowebBackendTask\Controller\HospitalController;
use Yumerov\CredowebBackendTask\Controller\UserController;

return [
    ['GET', '/api/hospitals', [HospitalController::class, 'list']],
    ['GET', '/api/hospitals/{id}', [HospitalController::class, 'read']],
    ['POST', '/api/hospitals', [HospitalController::class, 'create']],
    ['PUT', '/api/hospitals/{id}', [HospitalController::class, 'update']],
    ['DELETE', '/api/hospitals/{id}', [HospitalController::class, 'delete']],

    ['GET', '/api/users/{id}', [UserController::class, 'read']],
    ['POST', '/api/users', [UserController::class, 'create']],
    ['DELETE', '/api/users/{id}', [UserController::class, 'delete']],
];