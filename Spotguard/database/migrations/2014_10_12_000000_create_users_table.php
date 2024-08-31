<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->datetime('birth_date')->nullable();
            $table->string('mobile_number')->unique();
            $table->string('address')->nullable();
            $table->string('car_brand');
            $table->foreignId('body_type_id')->nullable()->constrained('body_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('car_color');
            $table->string('car_license_plate')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
