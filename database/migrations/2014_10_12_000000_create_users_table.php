<?php

use App\Models\User;
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

            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('bio')->nullable();
            $table->string('telephone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();

            $table->string('avatar')->nullable();
            $table->boolean('email_notification')->default(true);
            $table->boolean('sms_notification')->default(true);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_admin')->default(false);
            $table->string('role')->default(User::ROLE_USER);
            // createdby_id
            $table->foreignId('createdby_id')->nullable()->constrained('users', 'id')->nullOnDelete();

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
