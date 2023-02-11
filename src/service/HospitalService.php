<?php

namespace Yumerov\CredowebBackendTask\Service;

use Yumerov\CredowebBackendTask\Entity\Hospital;

class HospitalService extends BaseService {

    public function save(Hospital $hospital)
    {
        $statement = $this->entityManager
            ->getConnection()
            ->prepare('INSERT INTO hospitals(name, address, phone)
                VALUES (:name, :address, :phone)');
        $statement->bindValue(':name', $hospital->getName());
        $statement->bindValue(':address', $hospital->getAddress());
        $statement->bindValue(':phone', $hospital->getPhone());
        $statement->executeQuery();
    }
}