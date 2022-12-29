<?php 

declare(strict_types=1);

namespace App\Enums;

enum OutboundStatus: string
{

    const PreOrder = '0';
    const NewOrder = '1';
    const BackOrder = '2';
    const PrePick = '3';
    const Picked = '4';
    
}