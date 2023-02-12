<?php

namespace Yumerov\CredowebBackendTask\Response;

use Yumerov\CredowebBackendTask\Response\Response;
use Yumerov\CredowebBackendTask\Response\UserJson;
use Yumerov\CredowebBackendTask\Trait\UserTrait;

class UserListJson
{
    use UserTrait;

    public function __construct(private array $users) { }

    public function getResponse(): Response
    {
        $responseUsers = [];
        foreach ($this->users as $user) {
            $responseUsers[] = (new UserJson(
                $this->assocArrayToInstance($user)
            ))->getResponse()->getBody();
        }

        return new Response(['users' => $responseUsers]);
    }
}