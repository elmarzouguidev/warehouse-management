<?php

use App\Settings\EmailSettings;
use App\Settings\GeneralSettings;
use Illuminate\Support\Str;


if (!function_exists('getUuid')) {
    function getUuid()
    {
        return Str::uuid()->toString();
    }
}

if (!function_exists('appSettings')) {
    function appSettings()
    {
        return app(GeneralSettings::class);
    }
}

if (!function_exists('appEmail')) {
    function appEmail()
    {
        return app(EmailSettings::class);
    }
}
