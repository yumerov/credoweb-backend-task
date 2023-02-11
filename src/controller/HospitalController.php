<?php

namespace Yumerov\CredowebBackendTask\Controller;

use Yumerov\CredowebBackendTask\Response\HospitalJson;
use Yumerov\CredowebBackendTask\Response\NotFoundJson;
use Yumerov\CredowebBackendTask\Response\Response;
use Yumerov\CredowebBackendTask\Service\HospitalService;

class HospitalController {

    public function __construct(private HospitalService $service) { }

    public function read(int $id): Response
    {
        $hospital = $this->service->get($id);

        if ($hospital === null) {
            return (new NotFoundJson())->getResponse();
        }

        return (new HospitalJson($hospital))->getResponse();
    }
}