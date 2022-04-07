<?php


namespace App\Filters\Contracts;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    private $request;
    protected $builder;
    public function __construct()
    {
        $this->request = Request::capture();
    }

    public function apply(Builder $builder)
    {

        $this->builder = $builder;

        foreach ( $this->filters() as $key => $value){

             if(!method_exists($this, $key)){
                 return;
             }

             (!empty($value)) ? $this->{$key}($value) : $this->{$key}();

         }
    }

    private function filters()
    {
        //dd($this->request->all());
        //dd($this->request->method());
        return $this->request->all();
    }
}
