<?php

use Yumerov\CredowebBackendTask\Controller\HospitalController;

return [
    ['GET', '/api/hospitals/{id}', [HospitalController::class, 'read']]
];