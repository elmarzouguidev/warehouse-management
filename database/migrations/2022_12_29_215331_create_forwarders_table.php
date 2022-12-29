<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Shipping\Shipping;
use App\Models\Auth\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forwarders', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            // shipping , wallet, zone, 

            $table->foreignIdFor(User::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Shipping::class)->index()->nullable()->constrained()->nullOnDelete();
            
            $table->string('name', 100);
            $table->string('contact', 100);
            $table->longText('address');
            
            // last location
            $table->longText('last_location')->nullable();

            $table->boolean('is_active')->default(true); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forwarders');
    }
};
