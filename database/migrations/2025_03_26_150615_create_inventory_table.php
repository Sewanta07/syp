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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Item name
            $table->integer('quantity'); // Item quantity
            $table->string('category'); // Item category
            $table->date('stock_entry_date'); // Stock entry date
            $table->decimal('price', 10, 2); // Item price (max 10 digits, 2 decimal places)
            $table->string('image')->nullable(); // Image path (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
