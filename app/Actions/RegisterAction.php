<?php

namespace App\Actions;

use App\Abstracts\ActionAbstract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterAction extends ActionAbstract
{
	protected $must_cache = true;
	protected $cache_key  = 'name action';

	public function render()
	{
		return User::query()->create([
            'email' => $this->getParameter('email'),
            'name'  => $this->getParameter('name'),
            'password' => Hash::make(md5($this->getParameter('password')))
        ]);
	}

	public function method()
	{
		return self::METHOD_POST;
	}

	public function validation()
	{
		return [
			'name'  => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:4'
		];
	}
}