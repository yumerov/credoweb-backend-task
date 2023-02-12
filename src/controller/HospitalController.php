<?php

namespace Yumerov\CredowebBackendTask\Controller;

use Yumerov\CredowebBackendTask\Request\SaveHospital;
use Yumerov\CredowebBackendTask\Response\CreatedHospitalJson;
use Yumerov\CredowebBackendTask\Response\EmptyJson;
use Yumerov\CredowebBackendTask\Response\HospitalJson;
use Yumerov\CredowebBackendTask\Response\HospitalListJson;
use Yumerov\CredowebBackendTask\Response\InvalidJson;
use Yumerov\CredowebBackendTask\Response\NotFoundJson;
use Yumerov\CredowebBackendTask\Response\Response;
use Yumerov\CredowebBackendTask\Service\HospitalService;
use Yumerov\CredowebBackendTask\Enum\SortOrder;

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

    public function create(): Response
    {
        $request = new SaveHospital($this->request);

        // TODO: uncomment when validation begins to work
        // $error = $this->validate($request);

        // if ($error !== null) {
        //     return (new InvalidJson($error))->getResponse();
        // }

        $createdHospital = $this->service->save($request);

        return (new CreatedHospitalJson($createdHospital))->getResponse();
    }

    public function update(int $id): Response
    {
        $foundHospital = $this->service->get($id);

        if ($foundHospital === null) {
            return (new NotFoundJson())->getResponse();
        }

        // TODO: uncomment when validation begins to work
        // $error = $this->validate($request);

        // if ($error !== null) {
        //     return (new InvalidJson($error))->getResponse();
        // }

        $saveHospital = new SaveHospital($this->request);

        $updatedHospital = $this->service->update($foundHospital, $saveHospital);

        return (new HospitalJson($updatedHospital))->getResponse();
    }

    public function delete(int $id): Response
    {
        $foundHospital = $this->service->get($id);

        if ($foundHospital === null) {
            return (new NotFoundJson())->getResponse();
        }

        $this->service->delete($id);

        return (new EmptyJson())->getResponse();
    }

    public function list(): Response
    {
        $sort = SortOrder::tryFrom(isset($_GET['sort']) ? strtolower($_GET['sort']) : null);

        $hospitals = $this->service->list($sort);

        return (new HospitalListJson($hospitals))->getResponse();
    }
}