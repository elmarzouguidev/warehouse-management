<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Catalog\Product;
use App\Models\Auth\User;
use App\Models\Warehouse\Warehouse;
use App\Models\Shipping\Forwarder;
use App\Models\Shipping\Shipping;
use App\Models\Inbound\Inbound;
use App\Models\Outbound\Outbound;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forwarders', function (Blueprint $table) {
            
            // shipping , wallet, zone, 
            $table->after('uuid', function ($table) {
                $table->foreignIdFor(User::class)->index()->nullable()->constrained()->nullOnDelete();
                $table->foreignIdFor(Shipping::class)->index()->nullable()->constrained()->nullOnDelete();
            });
        });

        Schema::table('inbounds', function (Blueprint $table) {

            $table->after('uuid', function ($table) {
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
            });
        });

        Schema::table('outbounds', function (Blueprint $table) {

            $table->after('uuid', function ($table) {
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
            });
        });

        Schema::table('shippings', function (Blueprint $table) {

            $table->after('uuid', function ($table) {
                $table->foreignIdFor(Inbound::class)->index()->nullable()->constrained()->nullOnDelete();
                $table->foreignIdFor(Outbound::class)->index()->nullable()->constrained()->nullOnDelete();
                $table->foreignIdFor(User::class)->index()->nullable()->constrained()->nullOnDelete();
                $table->foreignIdFor(Forwarder::class)->index()->nullable()->constrained()->nullOnDelete();
                $table->foreignIdFor(Product::class)->index()->nullable()->constrained()->nullOnDelete();
                $table->foreignIdFor(Warehouse::class)->index()->nullable()->constrained()->nullOnDelete();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
