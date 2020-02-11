<?php

namespace Buersoft\Tinylaravel\Support\Facades;

use Buersoft\Tinylaravel\Foundation\Application;

abstract class Facade
{
	protected static $resolvedInstances = [];
	
	//1、指定代理对象
	protected static function getFacadeAccessor()
	{
		throw new Exception('facade does not implement getFacadeAccessor method.');
	}
	
	//2、解析代理对象
	public static function getFacadeRoot()
	{
		$class = static::getFacadeAccessor();
		
		if(\is_object($class)){
			return $class;
		}
		
		if(isset(static::$resolvedInstances[$class])){
			return static::$resolvedInstances[$class];
		}
		
		return static::$resolvedInstances[$class] = Application::getInstance()->make($class);
	}
	
	//3、调用代理对象
	//让子类可以代理其他类，并可以用静态方法调用其他类的方法
	public static function __callStatic($method, $args)
	{
		//解析代理对象
		$object = static::getFacadeRoot();
		if(!$object){
			throw new \Execption("没有找到这个类");
		}
		
		return $object->{$method}(...$args);
	}
}