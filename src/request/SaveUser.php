<?php

namespace Yumerov\CredowebBackendTask\Request;

use stdClass;
use Yumerov\CredowebBackendTask\Entity\Hospital;
use Yumerov\CredowebBackendTask\Enum\UserType;
use Yumerov\CredowebBackendTask\Interfaces\UserInterface;

class SaveUser implements UserInterface
{
    protected $email;
    private $firstName;
    private $lastName;
    private $type;
    private $workplace;

    public function __construct(stdClass $body)
    {
        $this->email = isset($body->email) ? $body->email : null;
        $this->firstName = isset($body->firstName) ? $body->firstName : null;
        $this->lastName = isset($body->lastName) ? $body->lastName : null;
        $this->type = isset($body->type) ? UserType::tryFrom($body->type)->value : null;
        if ($this->type === UserType::DOCTOR->value) {
            $this->workplace = new Hospital();
            $this->workplace->setId(isset($body->workplaceId) ? $body->workplaceId : null);
        }
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getWorkplace(): ?Hospital
    {
        return $this->workplace;
    }
}