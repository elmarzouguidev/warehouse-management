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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->string('name', 100)->unique();
            $table->string('symbole', 100);
            $table->integer('code')->default(0);
            
            // symbol position left or right left 0, right 1
            $table->integer('position')->default(1);
            
            $table->boolean('default')->default(false);
            
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
        Schema::dropIfExists('currencies');
    }
};
