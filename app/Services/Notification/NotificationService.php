<?php


namespace App\Services\Notification;


use App\Mail\TestMail;
use App\Services\Notification\Constants\NotificationTypes;
use App\Services\Provideers\EmailProvider;
use Illuminate\Support\Facades\Mail;

class NotificationService
{

    /**
     * @method sendEmail($user, $data);
     * @method sendSms($user, $data);
     **/

    public function send(... $params)
    {
        $type = $params[0]; // EMAIL
        //dump($params);
        $provider = '\\App\\Services\\Notification\\Providers\\' . $type . 'Provider';
        $providerInstance = new $provider();
        $providerInstance = $this->getProviderHandler($type);

        //array_shift($params);
        //dd($params[1]);
        $providerInstance->send($params[1]);



    }

    private function getProviderHandler($type)
    {
        $provider = null;
        switch ($type){
            case NotificationTypes::EMAIL:
                $provider = new \App\Services\Notification\Providers\EmailProvider();
        }
        return $provider;
    }




}
