<?php

namespace Yumerov\CredowebBackendTask\Controller;

use Yumerov\CredowebBackendTask\Response\NotFoundJson;
use Yumerov\CredowebBackendTask\Response\Response;
use Yumerov\CredowebBackendTask\Response\UserJson;
use Yumerov\CredowebBackendTask\Service\UserService;

class UserController extends Controller
{

    public function __construct(private UserService $service)
    {
    }

    public function read(int $id): Response
    {
        $user = $this->service->get($id);

        if ($user === null) {
            return (new NotFoundJson())->getResponse();
        }

        return (new UserJson($user))->getResponse();
    }
}
