<?php

namespace Buersoft\Tinylaravel\Database\Oracle;

use Buersoft\Tinylaravel\Contracts\Database\DB as DBInterface;

class DB implements DBInterface
{
	public function select()
	{
		return "Oracle中查询";
	}
}