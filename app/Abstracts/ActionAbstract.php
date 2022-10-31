<?php


namespace App\Abstracts;

use Illuminate\Support\Facades\Request;

abstract class ActionAbstract 
{
	const METHOD_GET    = 'GET';
	const METHOD_POST   = 'POST';
	const METHOD_PUT    = 'PUT';
	const METHOD_DELETE = 'DELETE';

	public function render()
	{
		return 'You forgot to add method.';
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
}
