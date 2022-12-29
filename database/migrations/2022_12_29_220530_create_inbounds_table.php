<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Catalog\Product;
use App\Models\Auth\User;
use App\Models\Warehouse\Warehouse;
use App\Models\Shipping\Forwarder;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbounds', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            // user who intercat with inbond
            $table->foreignIdFor(User::class)->index()->nullable()->constrained()->nullOnDelete();
            
            // products entering 
            // inspection map product history & journey
            $table->foreignIdFor(Product::class)->index()->nullable()->constrained()->nullOnDelete();
            // goods description
            
            // warehouse 
            $table->foreignIdFor(Warehouse::class)->index()->nullable()->constrained()->nullOnDelete();
            
            // informations & history 
            $table->foreignIdFor(Forwarder::class)->index()->nullable()->constrained()->nullOnDelete();
            
            // asn 
            $table->string('code', 129);
            // date 
            $table->dateTime('date');
            // value 
            $table->decimal('value');
            
            $table->string('total_weight');
            $table->stringl('total_volume');
            // asn status 

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
        Schema::dropIfExists('inbounds');
    }
};
