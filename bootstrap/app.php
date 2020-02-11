<?php

//创建Application
use Buersoft\Tinylaravel\Foundation\Application;

$app = new Buersoft\Tinylaravel\Foundation\Application();

//
$app->bind(
	Buersoft\Tinylaravel\Contracts\Http\Kernel::class,
	Buersoft\Tinylaravel\Foundation\Http\Kernel::class
);
//$app->make(KernelContract::class, [$app]);

return $app;