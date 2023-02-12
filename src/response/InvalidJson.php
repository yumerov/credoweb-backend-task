<?php

namespace Yumerov\CredowebBackendTask\Response;

use Yumerov\CredowebBackendTask\Entity\Hospital;

class InvalidJson
{
    public function __construct(private array $error) { }

    public function getResponse(): Response
    {
        return new Response([
            'message' => $this->error[1],
            'field' => $this->error[0]
        ], 422);
    }
}