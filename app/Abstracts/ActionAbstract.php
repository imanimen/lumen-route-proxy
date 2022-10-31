<?php


namespace App\Abstracts;

use Illuminate\Support\Facades\Request;

abstract class ActionAbstract 
{
	const METHOD_GET    = 'GET';
	const METHOD_POST   = 'POST';
	const METHOD_PATCH  = 'PATCH';
	const METHOD_DELETE = 'DELETE';

	public function run()
	{
		return 'Not Added!';
	}

	public function render()
	{
		$run = $this->run();
		return $run;
	}

	public function method()
	{
		return self::METHOD_GET;
	}

	public function getParameter( $name, $default=null)
	{
		$request = Request::capture();
		return $request->input($name, $default);
	}

	public function validation()
	{
		return [];
	}
}
