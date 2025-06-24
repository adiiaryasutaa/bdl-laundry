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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text("address")->nullable();
            $table->string("type")->comment("hotel, villa, personal");

            $table->timestamps();
            $table->softDeletes();

            $table->index("phone");
            $table->index("type");
            $table->index("deleted_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
