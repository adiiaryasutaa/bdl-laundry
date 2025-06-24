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
        Schema::create('ledger_entries', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->string("description");
            $table->decimal("amount", 10, 2);
            $table->enum("type", ["income", "expense"]);
            $table->foreignId("transaction_id")->nullable()->constrained("transactions")->onDelete("set null")->index();
            $table->timestamp("recorded_at");

            $table->timestamps();
            $table->softDeletes();

            $table->index("type");
            $table->index("transaction_id");
            $table->index("recorded_at");
            $table->index("created_at");    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledge_entries');
    }
};
