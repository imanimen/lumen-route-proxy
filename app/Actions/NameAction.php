<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;

class NameAction extends ActionAbstract
{
	public function render()
	{
		return 'the requsted name action';
	}

	public function getValidation(){}

	public function method()
	{
		return self::METHOD_GET;
	}
}