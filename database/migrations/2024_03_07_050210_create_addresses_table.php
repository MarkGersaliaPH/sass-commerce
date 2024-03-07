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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('order_id');
            $table->string('contact_no')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('street')->nullable();
            $table->string('state')->nullable();
            $table->string('barangay')->nullable(); 
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->timestamps();
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
