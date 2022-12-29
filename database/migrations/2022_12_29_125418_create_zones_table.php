<?php

declare(strict_types=1);

use App\Models\Auth\User;
use App\Models\Warehouse\Warehouse;
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
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->foreignIdFor(Warehouse::class)->index()->constrained()->cascadeOnDelete();

            $table->foreignIdFor(User::class)->index()->nullable()->constrained()->nullOnDelete(); //responsable

            $table->string('name');
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
        Schema::dropIfExists('zones');
    }
};
