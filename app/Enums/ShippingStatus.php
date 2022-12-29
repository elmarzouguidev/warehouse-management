<?php 

declare(strict_types=1);

namespace App\Enums;

enum ShippingStatus: string
{
    
    const Pending = '0';
    const Preparing = '1';
    const Shipping = '2';
    const Delivered = '3';
    const Cancelled = '4';
    const Failed = '5';

}