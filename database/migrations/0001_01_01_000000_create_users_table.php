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
        // Create the users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('email', 255)->unique();
            $table->string('whatsapp')->nullable();
            $table->string('image')->nullable();
            $table->enum('blokir', ['Y', 'N'])->default('N');
            $table->string('level')->default('pengguna');
            $table->string('metode_login')->nullable();
            $table->string('ip')->nullable(); // Nullable as IP is not always required
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Create the users_reset_tokens table
        Schema::create('users_reset_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->string('email')->index();
            $table->string('token');
            $table->timestamps();
        });

        // Create the users_sessions table with relation to 'users' table
        Schema::create('users_sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->date('tanggal')->nullable();
            $table->integer('hits')->default(0);
            $table->string('ip')->nullable();
            $table->string('perangkat')->nullable();
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->string('code_country', 10)->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->decimal('lat', 15, 10)->nullable();
            $table->decimal('long', 15, 10)->nullable();
            $table->string('isp')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_sessions');
        Schema::dropIfExists('users_reset_tokens');
        Schema::dropIfExists('users');
    }
};
