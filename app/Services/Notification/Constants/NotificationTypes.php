<?php


namespace App\Services\Notification\Constants;


use App\Services\Notification\Providers\EmailProvider;

class NotificationTypes
{
    const SMS = 'Sms';
    const EMAIL = 'Email';

    public static function getTranslateTypes($type = null)
    {
        if(is_null($type)){
            return [
                self::SMS => 'ارسال پیامک',
                self::EMAIL => 'ارسال ایمیل'
            ];
        }
        return [
            self::SMS => 'ارسال پیامک',
            self::EMAIL => 'ارسال ایمیل'
        ][$type];
    }


    public static function getTypesHandler($type = null)
    {
        if(is_null($type)){
            return [
                self::SMS => 'SMS',
                self::EMAIL => 'EMAIL'
            ];
        }
        return [
            self::SMS => 'SMS',
            self::EMAIL => 'EMAIL'
        ];[$type];
    }





}
