<?php

namespace Buersoft\Tinylaravel\Database\Mysql;

use Buersoft\Tinylaravel\Contracts\Database\DB as DBInterface;

class DB implements DBInterface
{
	public function select()
	{
		return "mysql中查询";
	}
}