<?php

use Illuminate\Support\Str;


if (!function_exists('getUuid')) {
    function getUuid()
    {
        return Str::uuid()->toString();
    }
}
