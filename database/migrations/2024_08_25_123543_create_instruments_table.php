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
        Schema::create('instrument', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name');
            $table->string('place');
            $table->string('designation');
            $table->string('organisation');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('age');
            $table->string('expertise');
            $table->string('qualification');
            $table->string('experience');
            $table->json('question')->nullable();
            $table->string('result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instruments');
    }
};
