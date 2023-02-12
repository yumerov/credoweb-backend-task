<?php

namespace Yumerov\CredowebBackendTask\Interfaces;

use Yumerov\CredowebBackendTask\Entity\Hospital;

interface UserInterface
{
    public function getEmail(): ?string;
    public function getFirstName(): ?string;
    public function getLastName(): ?string;
    public function getType(): ?string;
    public function getWorkplace(): ?Hospital;
}