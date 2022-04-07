<?php


namespace App\Presenter;


use App\Models\User;
use App\Presenter\Contracts\Presenter;

class UserPresenter extends Presenter
{
    public function status()
    {
        if(!is_null($this->entity->status)){

            return ($this->entity->status == User::USER_ACTIVE)
                ? '<span class="btn btn-sm btn-success">فعال</span>'
                : '<span class="btn btn-sm btn-warning">غیر فعال</span>';

        }

    }

    public function wallet()
    {
        if(!is_null($this->entity->status)){

            return $this->entity->wallet . 'تومان';

        }
    }
}
