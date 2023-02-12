<?php

namespace Yumerov\CredowebBackendTask\Service;

use Yumerov\CredowebBackendTask\Entity\Hospital;
use Yumerov\CredowebBackendTask\Interfaces\HospitalInterface;
use Yumerov\CredowebBackendTask\Request\SaveHospital;

class HospitalService extends BaseService {

    public function get(int $id): ?Hospital
    {
        $statement = $this->entityManager
            ->getConnection()
            ->prepare("SELECT id, name, address, phone FROM hospitals WHERE id = :id");
        $statement->bindValue(':id', $id);
        $result = $statement->executeQuery()->fetchAssociative();

        if ($result === false) {
            return null;
        }

        $hospital = new Hospital();
        $hospital->setId($result['id']);
        $hospital->setName($result['name']);
        $hospital->setAddress($result['address']);
        $hospital->setPhone($result['phone']);

        return $hospital;
    }

    public function save(HospitalInterface $hospital): Hospital
    {
        $statement = $this->entityManager
            ->getConnection()
            ->prepare('INSERT INTO hospitals(name, address, phone)
                VALUES (:name, :address, :phone)');
        $statement->bindValue(':name', $hospital->getName());
        $statement->bindValue(':address', $hospital->getAddress());
        $statement->bindValue(':phone', $hospital->getPhone());
        $statement->executeQuery();

        $savedHospital = new Hospital();
        $savedHospital->setId($this->entityManager->getConnection()->lastInsertId());
        $savedHospital->setName($hospital->getName());
        $savedHospital->setAddress($hospital->getAddress());
        $savedHospital->setPhone($hospital->getPhone());
        return $savedHospital;
    }
}