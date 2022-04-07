<?php


namespace App\Presenter\Contracts;


trait Presentable
{
    public $presenterInstance;
    public function present()
    {
        if(!$this->presenter){
            throw new \Exception('');
        }
        if(!$this->presenterInstance){

            $this->presenterInstance = new $this->presenter($this);

        }
       return $this->presenterInstance;
    }
}
