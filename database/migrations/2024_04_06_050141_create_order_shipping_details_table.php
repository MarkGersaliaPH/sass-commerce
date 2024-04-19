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
        Schema::create('order_shipping_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->string("name");
            $table->string("contact_no");
            $table->string("email")->nullable();
            $table->text('region')->nullable();
            $table->text('city')->nullable();
            $table->text('province')->nullable();
            $table->text('barangay')->nullable(); 
            $table->string('street')->nullable(); 
            $table->string('address')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_shipping_details');
    }
};
