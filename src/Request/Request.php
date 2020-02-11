<?php

namespace Buersoft\Tinylaravel\Request;

class Request
{
    private $self;

    public function input($method = null)
    {
        return (is_null($method))? null : $this->{$this->method()}($method);
    }

    public function get($method = null)
    {
        return (is_null($method)) ? $_GET : $_GET[$method];
    }

    public function post($method = null)
    {
        return (is_null($method)) ? $_POST : $_POST[$method];
    }
	
    // 获取请求类型
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function capture()
    {
        $this->self = $_SERVER['PHP_SELF'];
        return $this;
    }
}
