<?php

namespace Buersoft\Tinylaravel\Route;

class Route
{
    // 路由本质实现是会有一个容器在存储解析之后的路由
    protected $routes = [];
	
	public function __construct()
	{
		
	}
	
    // 定义了访问的类型
    protected $verbs = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];

    public function get($uri, $action)
    {
        return $this->addRoute(['GET'], $uri, $action);
        // var_dump($this);
    }

    public function post($uri, $action)
    {
        return $this->addRoute(['POST'], $uri, $action);
    }

    public function any($uri, $action)
    {
        return $this->addRoute(self::$verbs, $uri, $action);
    }

    public function addRoute($methods, $uri, $action)
    {
        foreach ($methods as $method ) {
            $this->routes[$method][$uri] = $action;
        }
        return $this;
    }

    public function dispatch($request)
    {
        // var_dump($this);
        // return runRoute($request);
    }

    public function findRoute($request)
    {

    }
    public function runRoute($request)
    {
      // code...
    }
}
