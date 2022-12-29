<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateEmailSettings extends SettingsMigration
{
    public function up(): void
    {
        /***server configuration ****/

        $this->migrator->add('email.mail_mailer', 'smtp');
        $this->migrator->add('email.mail_host', 'localhost');
        $this->migrator->add('email.mail_port', 25);
        $this->migrator->add('email.mail_encryption', 'ssl');

        /***Account Configuration ***/

        $this->migrator->add('email.mail_from_name', 'Warehouse management');
        $this->migrator->add('email.mail_from_address', 'management@localhost');
        $this->migrator->add('email.mail_username', 'management@localhost');
        $this->migrator->addEncrypted('email.mail_password', 'password');
    }
}
