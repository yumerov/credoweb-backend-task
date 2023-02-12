<?php

use Yumerov\CredowebBackendTask\Controller\HospitalController;

return [
    ['GET', '/api/hospitals', [HospitalController::class, 'list']],
    ['GET', '/api/hospitals/{id}', [HospitalController::class, 'read']],
    ['POST', '/api/hospitals', [HospitalController::class, 'create']],
    ['PUT', '/api/hospitals/{id}', [HospitalController::class, 'update']],
    ['DELETE', '/api/hospitals/{id}', [HospitalController::class, 'delete']],
];