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
        Schema::create('order_archives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_order_id')->index(); 
            $table->string('customer_name');
            $table->decimal('price', 8, 2);
            $table->timestamp('delivered_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_archives');
    }
};
