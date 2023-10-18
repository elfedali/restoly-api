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
        Schema::disableForeignKeyConstraints();

        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('district_id')->constrained();
            $table->string('address')->nullable();
            $table->foreignId('approvedby_id')->nullable()->constrained('users');
            $table->json('name');
            $table->string('slug', 128)->unique();
            $table->json('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->decimal('longitude')->nullable();
            $table->decimal('latitude')->nullable();
            $table->foreignId('currency_id')->constrained();
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
