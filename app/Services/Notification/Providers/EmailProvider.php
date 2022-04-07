<?php


namespace App\Services\Notification\Providers;


use App\Mail\TestMail;
use App\Mail\UserRegistered;
use App\Services\Notification\Contracts\NotificationContract;
use Illuminate\Support\Facades\Mail;

class EmailProvider implements NotificationContract
{
    public function send($data)
    {
        //dd($data);
        // TODO: Implement send() method.
        //$mail = $data[0];
        $mail = $data['user']->email;
        //return Mail::to($user->email)->send(new TestMail());
        return Mail::to($mail)->send(new UserRegistered());

    }
}
