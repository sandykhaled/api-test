<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('shoulder', 8, 2)->nullable();
            $table->decimal('waist', 8, 2)->nullable();
            $table->decimal('hips', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('bust', 8, 2)->nullable();
            $table->decimal('chest', 8, 2)->nullable();
            $table->decimal('inseam', 8, 2)->nullable();
            $table->decimal('thigh', 8, 2)->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('fav_color')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
