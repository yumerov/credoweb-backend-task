<?php

namespace Yumerov\CredowebBackendTask\Factory;

use Yumerov\CredowebBackendTask\Entity\Hospital;
use Yumerov\CredowebBackendTask\Entity\User;

class UserFactory extends BaseFactory {

    public function get(int $hospitalId): User
    {
        $types = ['patient', 'doctor'];

        $user = new User();
        $user->setEmail($this->generator->email());
        $user->setFirstName($this->generator->firstName());
        $user->setLastName($this->generator->lastName());
        $user->setType($types[$this->generator->numberBetween(0, 1)]);

        if ($user->getType() === 'doctor') {
            $hospital = new Hospital();
            $hospital->setId($hospitalId);
            $user->setWorkplace($hospital);
        }

        return $user;
    }
}