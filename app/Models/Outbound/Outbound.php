<?php

declare(strict_types=1);

namespace App\Models\Outbound;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Enums\OutboundStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outbound extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;


    // dn status enum
    // customer

    // picking list 
    // shipping list 

    // proof of delivery 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'is_active',
        'date',
        'code',
        'status',
        'name',
        'manager_id',
        'product_id',
        'forwarder_id',
        'warehouse_id',
        'value',
        'total_weight',
        'total_volume'
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'status' => OutboundStatus::class,
    ];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
