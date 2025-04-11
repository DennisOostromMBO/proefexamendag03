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
        Schema::create('reservering', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('PersoonId');
            $table->unsignedBigInteger('OpeningstijdId');
            $table->unsignedBigInteger('BaanId');
            $table->unsignedBigInteger('PakketOptieId')->nullable();
            $table->string('ReserveringStatus');
            $table->string('Reserveringsnummer');
            $table->date('Datum');
            $table->integer('AantalUren');
            $table->time('BeginTijd');
            $table->time('EindTijd');
            $table->integer('AantalVolwassen');
            $table->integer('AantalKinderen')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('PersoonId')->references('id')->on('persoon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservering');
    }
};
