<?php


namespace App\Services\Notification\Contracts;


interface NotificationContract
{
    public function send($data);
}
