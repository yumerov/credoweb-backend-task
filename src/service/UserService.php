<?php

namespace Yumerov\CredowebBackendTask\Service;

use Yumerov\CredowebBackendTask\Entity\Hospital;
use Yumerov\CredowebBackendTask\Entity\User;
use Yumerov\CredowebBackendTask\Interfaces\UserInterface;
use Yumerov\CredowebBackendTask\Trait\UserTrait;

class UserService extends BaseService {

    use UserTrait;

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

        return $this->assocArrayToInstance($result);
    }

    public function save(UserInterface $user): User
    {
        $sql = 'INSERT INTO users(first_name, last_name, email, "type", workplace_id)
                VALUES (:firstName, :lastName, :email, :type, :workplace)';

        $statement = $this->entityManager
            ->getConnection()
            ->prepare($sql);
        $statement->bindValue(':firstName', $user->getFirstName());
        $statement->bindValue(':lastName', $user->getLastName());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':type', $user->getType());
        $statement->bindValue(':workplace', $user->getWorkplace()?->getId());
        $statement->executeQuery();

        return $this->get($this->entityManager->getConnection()->lastInsertId());
    }

    public function delete(int $id): void
    {
        $statement = $this->entityManager
            ->getConnection()
            ->prepare('DELETE FROM users WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->executeQuery();
    }

    public function list(?int $workplace): array
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
            . " WHERE (u.workplace_id = :workplace OR :workplace IS NULL)";

        $statement = $this->entityManager
            ->getConnection()
            ->prepare($sql);

        $statement->bindValue(':workplace', $workplace);

        return $statement->executeQuery()->fetchAllAssociative();
    }
}