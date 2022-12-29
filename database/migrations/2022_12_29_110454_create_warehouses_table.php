<?php

use App\Models\Auth\User;
use App\Models\City\City;
use App\Models\City\Region;
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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->foreignIdFor(City::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Region::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(User::class)->index()->nullable()->constrained()->nullOnDelete();

            $table->string('name', 100);
            $table->string('contact', 100);
            $table->longText('address');
            $table->longText('map')->nullable();

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
        Schema::dropIfExists('warehouses');
    }
};
