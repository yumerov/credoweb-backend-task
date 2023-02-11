<?php

namespace Yumerov\CredowebBackendTask\Controller;

use stdClass;

class Controller {

    protected stdClass $request;

    public function setRequest(stdClass $request)
    {
        $this->request = $request;
    }
}