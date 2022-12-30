<?php

declare(strict_types=1);

namespace App\Models\Shipping;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Forwarder extends Model
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
        'name',
        'contact',
        'address',
        'last_location',
        'shipping_id'
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function forwarder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
