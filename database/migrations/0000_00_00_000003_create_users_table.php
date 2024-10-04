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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('User_Id')->unique();
            $table->string('username');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('city');
            $table->string('country');
            $table->text('address');
            $table->string('profile_image')->nullable();
            $table->foreignId('role_id')->nullable()->constrained('roles', 'id');
            $table->foreignId('branch_id')->nullable()->constrained('branches', 'id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
