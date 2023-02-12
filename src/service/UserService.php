<?php

namespace Yumerov\CredowebBackendTask\Service;

use Yumerov\CredowebBackendTask\Entity\Hospital;
use Yumerov\CredowebBackendTask\Entity\User;

class UserService extends BaseService {

    public function get(int $id): ?User
    {
        $sql = "SELECT"
            . " u.id AS u_id,"
            . " u.email AS U_email,"
            . " u.first_name AS u_first_name,"
            . " u.last_name AS u_last_name,"
            . " u.type AS u_type,"
            . " u.created_at AS u_created_at,"
            . " h.id AS h_id,"
            . " h.name AS h_name,"
            . " h.address AS h_address,"
            . " h.phone AS h_phone"
            . " FROM users as U"
            . " LEFT JOIN hospitals AS h ON h.id = u.workplace_id"
            . " WHERE u.id = :id";

        $statement = $this->entityManager
            ->getConnection()
            ->prepare($sql);
        $statement->bindValue(':id', $id);
        $result = $statement->executeQuery()->fetchAssociative();

        if ($result === false) {
            return null;
        }

        $hopsital = null;
        if ($result['h_id'] !== null) {
            $hopsital = new Hospital();
            $hopsital
                ->setId($result['h_id'])
                ->setName($result['h_name'])
                ->setAddress($result['h_address'])
                ->setPhone($result['h_phone']);
        }

        $createdAt = \DateTime::createFromFormat(
            'Y-m-d H:i:s.u',
            $result['u_created_at']
        );
        $user = (new User())
            ->setId($result['u_id'])
            ->setEmail($result['u_email'])
            ->setFirstName($result['u_first_name'])
            ->setLastName($result['u_last_name'])
            ->setType($result['u_type'])
            ->setCreatedAt($createdAt)
            ->setWorkplace($hopsital)
        ;

        return $user;
    }

    public function save(User $user)
    {
        $statement = $this->entityManager
            ->getConnection()
            ->prepare('INSERT INTO users(first_name, last_name, email, "type", workplace_id)
                VALUES (:firstName, :lastName, :email, :type, :workplace)');
        $statement->bindValue(':firstName', $user->getFirstName());
        $statement->bindValue(':lastName', $user->getLastName());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':type', $user->getType());
        $statement->bindValue(':workplace', $user->getWorkplace() ? $user->getWorkplace()->getId() : null);
        $statement->executeQuery();
    }

    public function delete(int $id): void
    {
        $statement = $this->entityManager
            ->getConnection()
            ->prepare('DELETE FROM users WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->executeQuery();
    }
}