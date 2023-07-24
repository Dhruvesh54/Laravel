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
    public function up():void {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('Full_name')->nullable(false);
            $table->string('Brance')->nullable(false);
            $table->string('subject')->nullable(false);
            $table->integer('Semester')->nullable(false);
            $table->string('Address')->nullable(false);
            $table->bigInteger('Mobile')->nullable(false);
            $table->string('Email')->unique()->nullable(false);
            $table->string('Password')->nullable(false);
            $table->string('Profile')->nullable(false);
            // $table->string('pic')->default('default.png');
            $table->string('role')->default('normal');
            $table->string('status')->default('Inactive');
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