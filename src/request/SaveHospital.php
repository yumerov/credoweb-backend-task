<?php

namespace Yumerov\CredowebBackendTask\Request;

use Symfony\Component\Validator\Constraints as Assert;
use stdClass;
use Yumerov\CredowebBackendTask\Interfaces\HospitalInterface;

/**
 * @Assert\Valid
 */
class SaveHospital implements HospitalInterface
{
    #[Assert\NotNull]
    #[Assert\Length(min: 3, max: 50)]
    protected $name;
    
    #[Assert\NotNull]
    #[Assert\Length(min: 3, max: 50)]
    private $address;
    
    #[Assert\NotNull]
    private $phone;

    public function __construct(stdClass $body)
    {
        $this->name = isset($body->name) ? $body->name : null;
        $this->address = isset($body->address) ? $body->address : null;
        $this->phone = isset($body->phone) ? $body->phone : null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }
}