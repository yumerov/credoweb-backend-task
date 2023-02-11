<?php

namespace Yumerov\CredowebBackendTask\Response;

class NotFoundJson extends Json
{
    public function getResponse(): Response
    {
        return new Response(['message' => 'Not found'], 404);
    }
}