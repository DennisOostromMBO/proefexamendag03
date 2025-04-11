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
        Schema::create('spel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('PersoonId');
            $table->unsignedBigInteger('ReserveringId');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('PersoonId')->references('id')->on('persoon')->onDelete('cascade');
            $table->foreign('ReserveringId')->references('id')->on('reservering')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spel');
    }
};
