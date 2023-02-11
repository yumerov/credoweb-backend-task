<?php

namespace Yumerov\CredowebBackendTask\Factory;

use Faker\Generator;
use Yumerov\CredowebBackendTask\Entity\Hospital;

class HospitalFactory extends BaseFactory {
    public function get(): Hospital
    {
        $hospital = new Hospital();
        $hospital->setName("{$this->generator->name()} Hospital");
        $hospital->setAddress($this->generator->address());
        $hospital->setPhone($this->generator->phoneNumber());
        return $hospital;
    }
}