<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $app_name;

    public string $app_version;

    public string $app_url;

    public string $app_logo;

    public bool $app_active;

    public static function group(): string
    {
        return 'general';
    }
}
