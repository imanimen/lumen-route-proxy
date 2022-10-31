<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;

class NameAction extends ActionAbstract
{
	public function render()
	{
		return 'ok I\'m here';
	}

	public function getValidation(){}

	public function method()
	{
		return self::METHOD_POST;
	}
}