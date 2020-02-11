<?php

namespace Buersoft\Tinylaravel\Foundation\Http;

use Buersoft\Tinylaravel\Contracts\Http\Kernel as KernelInterface;
use Buersoft\Tinylaravel\Foundation\Application;
use Buersoft\Tinylaravel\Route\Route;

class Kernel implements KernelInterface
{
	protected $app;
	protected $route;
	
	public function __construct(Application $app, Route $route)
	{
		$this->app = $app;
		$this->route = $route;
	}
	
	public function handler($request)
	{
		
	}
	
	public function dispatchToRoute($rquest)
	{
	    $this->app->make('route')->dispatch($request);
		
	}    
}