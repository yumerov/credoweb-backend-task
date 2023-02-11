<?php

namespace Yumerov\CredowebBackendTask\Controller;

use Yumerov\CredowebBackendTask\Request\SaveHospital;
use Yumerov\CredowebBackendTask\Response\HospitalJson;
use Yumerov\CredowebBackendTask\Response\NotFoundJson;
use Yumerov\CredowebBackendTask\Response\Response;
use Yumerov\CredowebBackendTask\Service\HospitalService;

class HospitalController extends Controller {

    public function __construct(private HospitalService $service) { }

    public function read(int $id): Response
    {
        $hospital = $this->service->get($id);

        if ($hospital === null) {
            return (new NotFoundJson())->getResponse();
        }

        return (new HospitalJson($hospital))->getResponse();
    }

    public function create()
    {
        var_dump(new SaveHospital($this->request));
        die;
    }
}