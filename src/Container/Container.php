<?php

namespace Buersoft\Tinylaravel\Container;

class Container
{
	//1、单例
	public static $instance;
	
	//2、需要容器
	public $bindings = [];
	
	//
    public $instances = [];
	
	//3、注册方法
	public function bind($abstract, $object)
	{
		$this->bindings[$abstract] = $object;
	}
	
	//4、解析方法
	public function make($abstract, $parameters = [])
	{
		return $this->resolve($abstract, $parameters);
	}
	
	public function resolve($abstract, $parameters = [])
	{
		if(isset($this->instances[$abstract])){
			return $this->instances[$abstract];
		}
		
		//1、判断在这个容器中是否存在
		if(!$this->has($abstract)){
			//如果不存在
			throw new \Exception('没有找到这个容器对象');
		}
		$object = $this->bindings[$abstract];
		
		//3、判断是否是一个闭包, Closure是一个预定义接口，所有的闭包函数都是实现了Colsure接口的一个对象
		//instanceof有什么作用：（1）判断一个对象是否是某个类的实例，（2）判断一个对象是否实现了某个接口。
		if($object instanceof Closure){
			return $object();
		}
		
		//2、判断是否是一个对象
		return $this->instances[$abstract] = is_object($object) ? $object : new $object(...$parameters);
	}
	
	public function has($abstract)
	{
		return isset($this->bindings[$abstract]);
	}
	
	//单例创建；返回的是当前实例化的对象，该对象的实例化符合单例模式
	public static function getInstance()
	{
		if(is_null(static::$instance)){
			//new self() 和 new static() 的区别
			//无论是 new static 还是 new self() 都是 new 一个对象
			//他们的区别只有在继承中体现
			//然后 new self() 返回的实列是不会变的，无论谁去调用，都返回的一个类的实列，而 new static则是由调用者决定的。
			static::$instance = new static;
		}
		
		return static::$instance;
	}
	
	//单例赋值，它不是实例化而是直接将对象赋值给单例， setInstance、getInstance都是给继承它的类的对象使用的，否则他们没有存在的意义
	//如果不存在继承关系，getInstance中的new static 与 new self()都是当前类本身，与$this 应该是全等的
	public static function setInstance($container = null)
	{
		return static::$instance = $container;
	}
}