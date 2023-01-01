<?php

declare(strict_types=1);

namespace App\Models\Utilities;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;

    // variant global, works for product, warehouse, shipping, or whatever
    // option ['value' 'price'] 
    // for product model, when price is set we can add variant price to it 
    //

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
