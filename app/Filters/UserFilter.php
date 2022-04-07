<?php


namespace App\Filters;


use App\Filters\Contracts\QueryFilter;

class UserFilter extends QueryFilter
{

    public function name($value = null)
    {
        return $this->builder->where('name', 'like', "%".$value."%");

    }

    public function email($value = null)
    {
        return $this->builder->where('email', 'like', "%".$value."%");

    }



}
