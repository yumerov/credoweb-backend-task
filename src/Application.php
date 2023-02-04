<?php

namespace Yumerov\CredowebBackendTask;

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