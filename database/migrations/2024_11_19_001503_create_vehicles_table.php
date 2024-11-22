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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('brand')->nullable();
            $table->string('reference')->nullable();
            $table->string('plate', 20)->nullable();
            $table->string('color', 100)->nullable();
            
            $table->unsignedBigInteger('type_car_id');
            $table->foreign('type_car_id')->references('id')->on('type_cars');
            
            $table->enum('state', [0,1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
