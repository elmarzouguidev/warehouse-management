<?php

use App\Settings\GeneralSettings;
use Illuminate\Support\Str;


if (!function_exists('getUuid')) {
    function getUuid()
    {
        return Str::uuid()->toString();
    }
}

if (!function_exists('appName')) {
    function appName()
    {
        return app(GeneralSettings::class)->app_name;
    }
}
