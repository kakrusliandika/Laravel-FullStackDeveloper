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
        // Create a unified oauth table
        Schema::create('users_oauth', function (Blueprint $table) {
            $table->id();
            $table->string('username')->index();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('name')->nullable();
            $table->string('secret', 125)->nullable();
            $table->string('provider')->nullable();
            $table->text('redirect')->nullable();
            $table->boolean('personal_access_client')->nullable();
            $table->boolean('password_client')->nullable();
            $table->boolean('revoked')->default(false);
            $table->string('token_type')->nullable();
            $table->string('token')->nullable();
            $table->text('scopes')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->string('access_token_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_oauth');
    }
};
