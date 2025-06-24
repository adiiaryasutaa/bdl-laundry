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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("customer_id")->constrained()->onDelete("cascade");
            $table->string("code")->unique();
            $table->string("label")->comment("e.g. Rumah, Kantor, Gudang");
            $table->string("phone")->nullable();
            $table->text("address_text");

            $table->timestamps();
            $table->softDeletes();

            $table->index("customer_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
