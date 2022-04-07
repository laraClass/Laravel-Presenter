<?php


namespace App\Presenter\Contracts;


abstract class Presenter
{
    protected $entity;
    public function __construct($entity)
    {
        $this->entity = $entity;
    }


    public function __get($property)
    {
        //dd( $this, $this->entity , $property);
        if(method_exists($this, $property)){
           return  $this->$property();
        }

        return $this->entity->$property;
    }







}
