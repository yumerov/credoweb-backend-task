<?php

namespace Yumerov\CredowebBackendTask\Controller;

use stdClass;
use Yumerov\CredowebBackendTask\Trait\ValidatorTrait;

class Controller {

    use ValidatorTrait;

    protected ?stdClass $request;

    public function setRequest(?stdClass $request)
    {
        $this->request = $request;
    }
}