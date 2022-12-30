<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->mediumText('description');
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
