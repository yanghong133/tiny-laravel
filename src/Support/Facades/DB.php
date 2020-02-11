<?php

namespace Buersoft\Tinylaravel\Support\Facades;

use Buersoft\Tinylaravel\Support\Facades\Facade;

class DB extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'db';
	}
}