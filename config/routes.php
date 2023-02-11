<?php

use Yumerov\CredowebBackendTask\Controller\HospitalController;

return [
    ['GET', '/api/hospitals/{id}', [HospitalController::class, 'read']],
    ['POST', '/api/hospitals', [HospitalController::class, 'create']]
];