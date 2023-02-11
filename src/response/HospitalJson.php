<?php

namespace Yumerov\CredowebBackendTask\Response;

use Yumerov\CredowebBackendTask\Entity\Hospital;

class HospitalJson
{
    public function __construct(private Hospital $hospital) { }

    public function getResponse(): Response
    {
        return new Response([
            'id' => $this->hospital->getId(),
            'name' => $this->hospital->getName(),
            'address' => $this->hospital->getAddress(),
            'phone' => $this->hospital->getPhone()
        ]);
    }
}