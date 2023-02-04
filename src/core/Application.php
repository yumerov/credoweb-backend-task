<?php

namespace Yumerov\CredowebBackendTask\Core;

final class Application {

    private function __contructor()
    {
        
    }

    public function run()
    {
    }

    public static function builder(): Application
    {
        return new Application();
    }
}