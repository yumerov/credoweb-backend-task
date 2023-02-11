<?php

namespace Yumerov\CredowebBackendTask;

use League\Container\Container;

class ContainerLoader {

    public function __construct(
        private string $rootDir,
        private Container $container
    ) { }

    public function load(): Container
    {
        $ds = DIRECTORY_SEPARATOR;
        $services = require("{$this->rootDir}{$ds}config{$ds}services.php");

        foreach ($services as $service => $dependencies) {
            $this->container->add($service)->addArguments($dependencies);
        }

        return $this->container;
    }
}