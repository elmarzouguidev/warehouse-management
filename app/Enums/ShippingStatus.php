<?php

declare(strict_types=1);

namespace App\Enums;

enum ShippingStatus: string
{

    const  PENDING = '0';
    const  PREPARING = '1';
    const  SHIPPING = '2';
    const  DELIVERED = '3';
    const  CANCELLED = '4';
    const  FAILED = '5';
}
