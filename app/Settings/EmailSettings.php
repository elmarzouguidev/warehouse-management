<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EmailSettings extends Settings
{
    public string $mail_mailer;

    public string $mail_host;

    public string $mail_port;

    public string $mail_encryption;
    

    public string $mail_from_name;

    public string $mail_from_address;

    public string $mail_username;

    public string $mail_password;


    public static function group(): string
    {
        return 'email';
    }

    public static function encrypted(): array
    {
        return [
            'mail_password'
        ];
    }
}
