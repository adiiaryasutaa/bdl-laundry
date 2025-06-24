<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->string("name");
            $table->string("category");
            $table->decimal("price_per_kg", 10, 2);
            $table->decimal("price_per_piece", 10, 2)->nullable();
            $table->enum("unit_type", ['kg', 'pcs']);

            $table->timestamps();
            $table->softDeletes();

            $table->index("category");
            $table->index("unit_type");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
