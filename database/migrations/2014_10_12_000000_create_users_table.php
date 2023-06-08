<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('oauth_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('oauth_provider')->default('github');
            $table->string('oauth_token')->nullable();
            $table->string('oauth_refresh_token')->nullable();
            $table->string('oauth_token_expired_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
