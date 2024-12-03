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
        Schema::create('answers_by_question_users', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('questions_user_id');
            $table->foreign('questions_user_id')->references('id')->on('questions_user');

            $table->string('answer')->nullable();
            $table->enum('state', [0,1])->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers_by_question_users');
    }
};
