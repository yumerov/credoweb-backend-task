<?php

namespace Yumerov\CredowebBackendTask\Controller;

use Yumerov\CredowebBackendTask\Response\Response;

class HospitalController extends Controller {

    public function read(int $id): Response
    {
        return new Response([
            'id' => 2,
            'name' => 'Test hospital',
            'address' => 'Test address',
            'phone' => '+359 898 123 123'
        ]);
    }
}