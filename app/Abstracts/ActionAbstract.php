<?php


namespace App\Abstracts;

abstract class ActionAbstract 
{
	const METHOD_GET  = 'GET';
	const METHOD_POST = 'POST';

	public function render()
	{
		return 'You forgot to add method.';
	}

	public function method()
	{
		return self::METHOD_GET;
	}
}
