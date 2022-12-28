<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.app_name', 'Warehouse management');
        $this->migrator->add('general.app_version', '1.0.0');
        $this->migrator->add('general.app_logo', 'logo.png');
        $this->migrator->add('general.app_url', 'laravel.com');
        $this->migrator->add('general.app_active', true);
    }
}
