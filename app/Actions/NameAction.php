<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;

class NameAction extends ActionAbstract
{
	protected $must_cache = true;

	public function render()
	{
		return 'Your name is '.$this->getParameter('name').'.';
	}

	public function validation()
	{
		return [
			'name' => 'required|string'
		];
	}

	public function method()
	{
		return self::METHOD_GET;
	}
}