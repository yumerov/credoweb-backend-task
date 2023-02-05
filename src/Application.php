<?php

namespace Yumerov\CredowebBackendTask;

use Doctrine\ORM\EntityManager;
use League\Container\Container;
use Yumerov\CredowebBackendTask\Routing\Dispatcher;

final class Application {

    private Container $container;

    private function __contructor()
    {
        
    }

    public function setContainer(Container $container): Application
    {
        $this->container = $container;

        return $this;
    }

    public function initDataLayer()
    {
        $entityManager = $this->container->get(DataLayer::class)->init();
        $this->container->add(EntityManager::class, function () use ($entityManager) {
            return $entityManager;
        });

        return $this;
    }

    public function run()
    {
        $this->container->get(Dispatcher::class)->dispatch();

        return $this;
    }

    public static function builder(): Application
    {
        return new Application();
    }
}