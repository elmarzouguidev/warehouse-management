<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Catalog\Product;
use App\Models\Warehouse\Warehouse;
use App\Models\Shipping\Forwarder;
use App\Models\Inbound\Inbound;
use App\Models\Outbound\Outbound;
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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->foreignIdFor(Inbound::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Outbound::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(User::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Forwarder::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Product::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Warehouse::class)->index()->nullable()->constrained()->nullOnDelete();

            // date
            $table->dateTime('date');
            // Expected delivery date 
            $table->dateTime('expected_at');
            // time Dispatch 
            $table->dateTime('time_dispatch');
            // reference number 
            $table->string('code', 128);
            // Location 
            $table->longText('location')->nullable();
            // description 
            $table->longText('description');
            // Tracking number 
            $table->string('tracking_number', 128);

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
        Schema::dropIfExists('shippings');
    }
};
