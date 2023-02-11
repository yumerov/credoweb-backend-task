<?php

namespace Yumerov\CredowebBackendTask\Service;

use Doctrine\ORM\EntityManager;

abstract class BaseService 
{
    public function __construct(
        protected EntityManager $entityManager
    ) { }
}