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
        Schema::create('baggage', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('weight');
            $table->string('receiver_phone');
            $table->string('sending_address');
            $table->string('company')->nullable();
            $table->string('receiving_address');
             // Make 'status' nullable
            $table->unsignedBigInteger('post_id')->nullable(); // Make 'post_id' nullable
            $table->unsignedBigInteger('delivery_status_id')->nullable(); // Make 'delivery_status_id' nullable
        
            // Define foreign key constraints (assuming 'posts' and 'delivery_status' tables exist)
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('delivery_status_id')->references('id')->on('delivery_status')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baggage');
    }
};
