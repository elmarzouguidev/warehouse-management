<?php

declare(strict_types=1);

use App\Models\Warehouse\Property;
use App\Models\Warehouse\Size;
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
        Schema::create('bins', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->foreignIdFor(Size::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Property::class)->index()->nullable()->constrained()->nullOnDelete();

            $table->string('name', 100);
            $table->mediumInteger('description')->nullable();
            
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
        Schema::dropIfExists('bins');
    }
};
