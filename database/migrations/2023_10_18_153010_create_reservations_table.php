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

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('user_id');
            $table->foreignId('approvedby_id')->nullable()->constrained('users');
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('arrival_date');
            $table->dateTime('departure_date')->nullable();
            $table->enum('status', ["pending","accepted","rejected"]);
            $table->text('note')->nullable();
            $table->unsignedBigInteger('reservationable_id');
            $table->string('reservationable_type');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
