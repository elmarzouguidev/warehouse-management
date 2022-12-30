<?php

declare(strict_types=1);

use App\Models\Catalog\Brand;
use App\Models\Catalog\Category;
use App\Models\Utilities\Tax;
use App\Models\Utilities\Unit;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->foreignIdFor(Category::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Brand::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Tax::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Unit::class)->index()->nullable()->constrained()->nullOnDelete();

            $table->string('name', 100)->unique();
            $table->mediumText('description')->nullable();

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
        Schema::dropIfExists('products');
    }
};
