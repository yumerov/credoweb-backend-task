<?php

namespace Yumerov\CredowebBackendTask;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DataLayer {

    public function __construct(
        private string $rootDir
    ) { }

    public function init(): EntityManager
    {
        $ds = DIRECTORY_SEPARATOR;

        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(
            ["{$this->rootDir}{$ds}src{$ds}entity"], $isDevMode);

        $connection = require("{$this->rootDir}{$ds}config{$ds}database.php");

        return EntityManager::create($connection, $config);
    }
}