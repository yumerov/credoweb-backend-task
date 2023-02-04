<?php

namespace Yumerov\CredowebBackendTask\Response;

class Response {
    public function __construct(
        private $body,
        private int $status = 200) { }

   public function getBody()
   {
        return $this->body;
   }

   public function getStatus()
   {
        return $this->status;
   }
}