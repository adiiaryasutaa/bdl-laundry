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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->date("transaction_date");
            $table->enum("payment_status", ["unpaid", "paid", "partial"])->default("unpaid");

            $table->timestamps();
            $table->softDeletes();

            $table->index("transaction_date");
            $table->index("payment_status");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
