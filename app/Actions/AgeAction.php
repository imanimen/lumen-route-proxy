<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;
use App\Manners\IsAdminManner;
use App\Manners\JwtRemoteManner;

class AgeAction extends ActionAbstract
{
	public function render()
	{
		$age = $this->getUser()->age;
		// dd($this->getParameter('age'));
		if ($age < 18){
			return 'You are ' .$age. ' years old.';
		}
		else {
			return 'You are not allowed to see this page';
		}
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

	public function getManner()
	{
		return JwtRemoteManner::class;
	}
}