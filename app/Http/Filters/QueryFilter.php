<?php 

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
	protected $requests;
	protected $builder;

	public function __construct(Request $request)
	{
		$this->requests = $request;
	}

	public function apply(Builder $builder)
	{
		$this->builder = $builder;

		foreach($this->requests() as $name => $value){
			if(method_exists($this, $name)){
				call_user_func_array([$this, $name], array_filter([$value]));
			}
		}

		return $this->builder;
	}

	protected function requests()
	{
		return $this->requests->all();
	}
}