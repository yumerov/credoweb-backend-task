<?php

namespace Yumerov\CredowebBackendTask\Response;

use Yumerov\CredowebBackendTask\Entity\User;

class UserJson
{
public function __construct(private User $user, private int $status = 200) { }

    public function getResponse(): Response
    {
        return new Response([
            'id' => $this->user->getId(),
            'email' => $this->user->getEmail(),
            'firstName' => $this->user->getFirstName(),
            'lastName' => $this->user->getLastName(),
            'type' => $this->user->getType(),
            'createdAt' => $this->user->getCreatedAt(),
            'workplace' => $this->user->getWorkplace() ? [
                'id' => $this->user->getWorkplace()->getId(),
                'name' => $this->user->getWorkplace()->getName(),
                'address' => $this->user->getWorkplace()->getAddress(),
                'phone' => $this->user->getWorkplace()->getPhone()
            ] : null
        ], $this->status);
    }
}