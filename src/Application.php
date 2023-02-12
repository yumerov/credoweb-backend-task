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

    private function setContainer(Container $container): Application
    {
        $this->container = $container;

        return $this;
    }

    private function initDataLayer(): self
    {
        $entityManager = $this->container->get(DataLayer::class)->init();
        $this->container->add(EntityManager::class, function () use ($entityManager) {
            return $entityManager;
        });

        return $this;
    }

    private function initValidator(): self
    {
        $this->container->add(ValidatorInterface::class, function () {
            return Validation::createValidator();
        });

        return $this;
    }

    public function init(Container $container): self
    {
        $this
            ->setContainer($container)
            ->initDataLayer()
            ->initValidator();

        return $this;
    }

    public function run(): self
    {
        try {
            $this->container
                ->get(Dispatcher::class)
                ->setContainer($this->container)
                ->dispatch();
        } catch (\Exception $ex) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['message' => $ex->getMessage()]);
        }

        return $this;
    }

    public static function builder(): self
    {
        return new Application();
    }
}