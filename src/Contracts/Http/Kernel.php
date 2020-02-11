<?php

namespace Buersoft\Tinylaravel\Contracts\Http;

interface Kernel
{
	public function handler($request);
}