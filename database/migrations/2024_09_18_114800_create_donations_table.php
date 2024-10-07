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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->foreignId('deceasedId')->references('id')->on('deceased')->onDelete('CASCADE')->onUpdate('CASCADE');;
            $table->foreignId('memberId')->references('id')->on('members')->onDelete('CASCADE')->onUpdate('CASCADE');;
            $table->date('date');
            $table->enum('status' , ['in_progress' , 'completed' , 'pending' , 'canceled'])->default('completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
