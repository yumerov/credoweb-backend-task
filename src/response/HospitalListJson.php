<?php

namespace Yumerov\CredowebBackendTask\Response;

use Yumerov\CredowebBackendTask\Entity\Hospital;

class HospitalListJson
{
    public function __construct(private array $hospitals) { }

    public function getResponse(): Response
    {
        return new Response(['hospitals' => $this->hospitals]);
    }
}