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

        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_category_id')->constrained();
            $table->json('name');
            $table->decimal('price');
            $table->json('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_veg')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->integer('position')->default(0);


            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
