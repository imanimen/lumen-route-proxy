<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;
use App\Manners\IsAuthManner;
use App\Manners\JwtRemoteManner;
use App\Manners\MustEnterNameManner;
use Illuminate\Support\Facades\Request;

class NameAction extends ActionAbstract
{
	protected $must_cache = true;
	protected $cache_key  = 'name action';

	public function render()
	{
		return 'Your name is '.$this->getParameter('name').'. and your uuid is: ' . $this->getUserId();
	}

	public function method()
	{
		return self::METHOD_POST;
	}

	public function validation()
	{
		return [
			'name' => 'required|string'
		];
	}

	public function getManner()
	{
		return JwtRemoteManner::class;	
	}
}