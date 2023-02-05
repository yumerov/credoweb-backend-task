<?php

use Yumerov\CredowebBackendTask\Application;
use League\Container\Container;
use Yumerov\CredowebBackendTask\ContainerLoader;

require 'vendor/autoload.php';

Application::builder()
    ->setContainer((new ContainerLoader(__DIR__, new Container()))->load())
    ->initDataLayer()
    ->run();
