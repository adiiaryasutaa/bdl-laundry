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
        Schema::create('laundry_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("laundry_order_id")->constrained('laundry_orders')->onDelete('cascade');
            $table->foreignId("item_id")->constrained('items')->onDelete('cascade');
            $table->string("code")->unique();
            $table->integer("quantity");
            $table->decimal("subtotal", 10, 2);

            $table->timestamps();
            $table->softDeletes();

            // Add indexes for performance (foreign keys already have indexes automatically)
            $table->index(['laundry_order_id', 'item_id']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_order_items');
    }
};
