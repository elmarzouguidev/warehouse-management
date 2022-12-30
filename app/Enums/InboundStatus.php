<?php

declare(strict_types=1);

namespace App\Enums;

enum InboundStatus: string
{

    const  PRE_DELIVERY = '0';
    const  PRE_LOAD  = '1';
    const  SORTING = '2';
    const  SORTED = '3';
    const  SHORTAGE = '4';
    const  MORE_QTY = '5';
}
