<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;

class AgeAction extends ActionAbstract
{
	public function render()
	{
		return 'im 20 years old.';
	}


	public function method()
	{
		return self::METHOD_POST;
	}
}