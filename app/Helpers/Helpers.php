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

if (!function_exists('upsertEnvironmentValue')) {
    /**
     * Function to set or update .env variable.
     */
    function upsertEnvironmentValue(array $values): bool
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (\count($values) > 0) {
            $str .= "\n"; // In case the searched variable is in the last line without \n
            foreach ($values as $envKey => $envValue) {
                if ($envValue === true) {
                    $value = 'true';
                } elseif ($envValue === false) {
                    $value = 'false';
                } else {
                    $value = $envValue;
                }

                $envKey = mb_strtoupper($envKey);
                $keyPosition = mb_strpos($str, "{$envKey}=");
                $endOfLinePosition = mb_strpos($str, "\n", $keyPosition);
                $oldLine = mb_substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                $space = mb_strpos($value, ' ');
                $envValue = $space === false ? $value : '"' . $value . '"';

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
                env($envKey, $envValue);
            }
        }

        $str = mb_substr($str, 0, -1);

        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }
}
