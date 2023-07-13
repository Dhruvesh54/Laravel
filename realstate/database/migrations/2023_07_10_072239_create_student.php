<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('Full_name')->nullable();
            $table->string('Brance')->nullable();
            $table->string('subject')->nullable();
            $table->integer('Semester')->nullable();
            $table->string('Address')->nullable();
            $table->bigInteger('Mobile')->nullable();
            $table->string('Email')->Unique()->nullable();
            $table->string('Password')->nullable();
            $table->string('Profile')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
