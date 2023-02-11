<?php

namespace Yumerov\CredowebBackendTask\Request;

use stdClass;

class SaveHospital
{
    private ?string $name;
    private ?string $address;
    private ?string $phone;

    public function __construct(stdClass $body)
    {
        $this->name = isset($body->name) ? $body->name : null;
        $this->address = isset($body->address) ? $body->address : null;
        $this->phone = isset($body->phone) ? $body->phone : null;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}