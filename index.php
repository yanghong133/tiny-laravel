<?php

require 'vendor/autoload.php';

use Buersoft\Tinylaravel\Foundation\Application;
use Buersoft\Tinylaravel\Test;

$app = new Application();

$app->bind('test', Test::class);
echo $app->make('test')->index();
var_dump($app->bindings);
var_dump($app->instances);
var_dump($app->getInstance());