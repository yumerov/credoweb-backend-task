<?php

namespace Yumerov\CredowebBackendTask\Interfaces;

interface HospitalInterface
{
    public function getName(): ?string;
    public function getAddress(): ?string;
    public function getPhone(): ?string;
}