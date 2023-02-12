<?php

namespace Yumerov\CredowebBackendTask\Response;

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