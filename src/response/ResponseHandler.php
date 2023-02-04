<?php

namespace Yumerov\CredowebBackendTask\Response;

class ResponseHandler {

    public function handle(Response $response): void
    {
        http_response_code($response->getStatus());
        header('Content-Type: application/json');
        echo json_encode($response->getBody());
    }
}