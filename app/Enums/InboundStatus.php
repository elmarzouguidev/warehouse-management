<?php 

declare(strict_types=1);

namespace App\Enums;

enum InboundStatus : string
{
    
    const PreDelivery = '0';
    const PreLoad  = '1';
    const Sorting = '2';
    const Sorted = '3';
    const Shortage = '4';
    const MoreQty = '5';

}