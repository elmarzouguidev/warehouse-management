<?php

declare(strict_types=1);

namespace App\Models\Shipping;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Enums\ShippingStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'is_active',
        'inbound_id',
        'outbound_id',
        'manager_id',
        'forwarder_id',
        'product_id',
        'warehouse_id',
        'date',
        'expected_at',
        'time_dispatch',
        'code', // refrence number
        'location',
        'description',
        'tracking_number',
        'status'
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'status' => ShippingStatus::class,
    ];

    public function forwarder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
