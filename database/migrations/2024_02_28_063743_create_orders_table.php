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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number')->unique();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('user_address'); // this not the best solution but to minimize time
            $table->enum('status',['pending','in_way','completed'])->default('pending');
            $table->decimal('total',16,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
