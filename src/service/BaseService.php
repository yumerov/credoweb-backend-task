<?php

namespace Yumerov\CredowebBackendTask\Service;

use Doctrine\ORM\EntityManagerInterface;

abstract class BaseService 
{
    public function __construct(
        protected EntityManagerInterface $entityManager
    ) { }
}