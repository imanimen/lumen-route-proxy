<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;

class AgeAction extends ActionAbstract
{
	public function render()
	{
		return 'im ' .$this->getParameter('age'). ' years old.';
	}

	public function method()
	{
		return self::METHOD_POST;
	}

	public function validation()
	{
		return [
			'age' => 'required|integer'
		];
	}
}