<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;

class NameAction extends ActionAbstract
{
	protected $must_cache = true;
	protected $cache_key  = 'name action';

	public function render()
	{
		return 'Your name is '.$this->getParameter('name').'.';
	}

	public function method()
	{
		return self::METHOD_POST;
	}

	public function validation()
	{
		return [
			'name' => 'required|integer'
		];
	}
}