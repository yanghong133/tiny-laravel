<?php

namespace Buersoft\Tinylaravel\Foundation;

use Buersoft\Tinylaravel\Container\Container;
use Buersoft\Tinylaravel\Database\Mysql\DB as MysqlDB;
use Buersoft\Tinylaravel\Database\Oracle\DB as OracleDB;
use Buersoft\Tinylaravel\Route\Route;
use Buersoft\Tinylaravel\Request\Request;

class Application extends Container
{
	function __construct()
	{
		$this->registerBaseBindings();
		$this->registerCoreContainerAliases();
	}
	
	public function registerBaseBindings()
	{
		static::setInstance($this);
		
		$this->instances['app'] = $this;
	}
	
	//注册框架运行中所需要的服务
	public function registerCoreContainerAliases()
	{
		$bind = [
			'mysql' => MysqlDB::class,
			'oracle' => OracleDB::class,
			'db' => MysqlDB::class,
			'route' => Route::class,
			'request' => Request::class,
		];
		
		foreach($bind as $key=>$value){
			$this->bind($key, $value);
		}
	}
}