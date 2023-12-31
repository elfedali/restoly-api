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
            $table->json('name');
            $table->string('slug')->unique();
            $table->json('description')->nullable();


            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('createdby_id')->constrained('users');
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('approvedby_id')->nullable()->constrained('users');
            $table->timestamp('approved_at')->nullable();

            $table->string('address')->nullable();
            $table->boolean('is_active')->default(true);
            $table->decimal('longitude')->nullable();
            $table->decimal('latitude')->nullable();
            $table->foreignId('currency_id')->nullable()->constrained();
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();

            //$table->softDeletes();


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
