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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->foreignId("transaction_id")->constrained()->onDelete("cascade")->index();
            $table->decimal("amount", 10, 2);
            $table->string("payment_method");
            $table->timestamp("paid_at");

            $table->timestamps();
            $table->softDeletes();

            $table->index("payment_method");
            $table->index("transaction_id");
            $table->index("paid_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
