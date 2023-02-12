<?php

namespace Yumerov\CredowebBackendTask;

use Doctrine\ORM\EntityManager;
use League\Container\Container;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Yumerov\CredowebBackendTask\Routing\Dispatcher;
use Symfony\Component\Validator\Validation;

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

    public function initDataLayer(): self
    {
        $entityManager = $this->container->get(DataLayer::class)->init();
        $this->container->add(EntityManager::class, function () use ($entityManager) {
            return $entityManager;
        });

        return $this;
    }

    public function initValidator(): self
    {
        $this->container->add(ValidatorInterface::class, function () {
            return Validation::createValidator();
        });

        return $this;
    }

    public function run(): self
    {
        $this->container
            ->get(Dispatcher::class)
            ->setContainer($this->container)
            ->dispatch();

        return $this;
    }

    public static function builder(): self
    {
        return new Application();
    }
}