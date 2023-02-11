<?php

namespace Yumerov\CredowebBackendTask\Response;

abstract class Json
{
    abstract public function getResponse(): Response;
}