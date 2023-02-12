<?php

namespace Yumerov\CredowebBackendTask\Response;

class EmptyJson
{
    public function __construct() { }

    public function getResponse(): Response
    {
        return new Response([], 204);
    }
}