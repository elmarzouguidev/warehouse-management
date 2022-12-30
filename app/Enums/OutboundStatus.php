<?php

declare(strict_types=1);

namespace App\Enums;

enum OutboundStatus: string
{

    const  PRE_ORDER = '0';
    const  NEW_ORDER = '1';
    const  BACK_ORDER = '2';
    const  PRE_PICK = '3';
    const  PICKED = '4';
}
