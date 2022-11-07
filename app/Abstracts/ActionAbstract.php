<?php


namespace App\Abstracts;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;
use App\Intefaces\ActionInteface;

abstract class ActionAbstract implements ActionInteface
{
	const METHOD_GET    = 'GET';
	const METHOD_POST   = 'POST';
	const METHOD_PATCH  = 'PATCH';
	const METHOD_DELETE = 'DELETE';

	protected $should_cache = false;
	protected $cache_key  = 'default_key';
	protected $caceh_ttl  = 10;

	public function run()
	{
		return 'Not Added!';
	}

	public function render()
	{
		if (!$this->should_cache)
		{
			return $this->runRender();
		} 
		else
		{
			if (is_null($this->cache_key))
			{
				$className = get_class( $this );
				$this->setCacheKey = md5($className);
			}
			return Cache::remember($this->cache_key, $this->caceh_ttl, function () {
				return $this->runRender();
			});
		}
	}

	public function runRender()
	{
		$run = $this->run();
		return $run;
	}

	public function method()
	{
		return self::METHOD_GET;
	}

	public function getParameter( $name, $default=null)
	{
		$request = Request::capture();
		return $request->input($name, $default);
	}

	public function validation()
	{
		return [];
	}


	public function setCacheKey( string $key ): string
	{
		return $this->cache_key = $key;
	}

	public function setCacheTtl( int $ttl ): int
	{
		return $this->cache_ttl = $ttl;
	}
}
