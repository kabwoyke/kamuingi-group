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
        Schema::create('benefeciaries', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('middle_name');
            $table->text('last_name');
            $table->date('dob');
            $table->text("phone_number");
            $table->text("physical_address");
            $table->foreignId('member_id')->references('id')->on('members');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefeciaries');
    }
};
