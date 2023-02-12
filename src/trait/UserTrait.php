<?php

namespace Yumerov\CredowebBackendTask\Trait;

use Yumerov\CredowebBackendTask\Entity\Hospital;
use Yumerov\CredowebBackendTask\Entity\User;

trait UserTrait
{
    protected function assocArrayToInstance(array $user): User
    {
        $hopsital = null;
        if ($user['h_id'] !== null) {
            $hopsital = new Hospital();
            $hopsital
                ->setId($user['h_id'])
                ->setName($user['h_name'])
                ->setAddress($user['h_address'])
                ->setPhone($user['h_phone']);
        }

        $createdAt = \DateTime::createFromFormat(
            'Y-m-d H:i:s.u',
            $user['u_created_at']
        );
        $user = (new User())
            ->setId($user['u_id'])
            ->setEmail($user['u_email'])
            ->setFirstName($user['u_first_name'])
            ->setLastName($user['u_last_name'])
            ->setType($user['u_type'])
            ->setCreatedAt($createdAt)
            ->setWorkplace($hopsital)
        ;

        return $user;
    }
}