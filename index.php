<?php

require 'vendor/autoload.php';

// use Buersoft\Tinylaravel\Foundation\Application;
// use Buersoft\Tinylaravel\Test;
// use Buersoft\Tinylaravel\Support\Facades\DB;
// use Buersoft\Tinylaravel\Contracts\Http\Kernel as KernelContract;
// use Buersoft\Tinylaravel\Foundation\Http\Kernel;

// $app = new Application();
// $app->bind(KernelContract::class, Kernel::class);
// $app->make(KernelContract::class, [$app]);
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Buersoft\Tinylaravel\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Buersoft\Tinylaravel\Request\Request::capture()
);

$response->send();