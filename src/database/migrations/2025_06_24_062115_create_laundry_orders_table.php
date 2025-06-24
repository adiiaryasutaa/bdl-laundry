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
        Schema::create('laundry_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete("cascade");
            $table->foreignId('transaction_id')->nullable()->constrained()->onDelete("set null");
            $table->string("code")->unique();
            $table->dateTime('pickup_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'delivered']);
            $table->text("alamat")->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index("status");
            $table->index("pickup_at");
            $table->index("delivered_at");
            $table->index("created_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_orders');
    }
};
