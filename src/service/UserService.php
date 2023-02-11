<?php

namespace Yumerov\CredowebBackendTask\Service;

use Yumerov\CredowebBackendTask\Entity\User;

class UserService extends BaseService {

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
}