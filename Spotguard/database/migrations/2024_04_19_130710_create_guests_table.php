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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('resident_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('car_brand');
            $table->foreignId('body_type_id')->nullable()->constrained('body_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('car_color');
            $table->string('car_license_plate')->unique();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
