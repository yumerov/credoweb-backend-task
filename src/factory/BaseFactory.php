<?php

namespace Yumerov\CredowebBackendTask\Factory;

use Faker\Generator;

abstract class BaseFactory
{
    public function __construct(protected Generator $generator) { }
}