<?php

declare(strict_types=1);

namespace App\Models\Catalog;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;

    // product shape 
    // situation : 
    // we have some product with a shape 10x10 
    // a bin can take up to 10 products with some shape like 10mts or 5x5mts, 
    // so we can calculate the value of each product to determine the value of this bin

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'is_active',
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
