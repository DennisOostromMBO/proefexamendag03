<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->boolean('IsActive')->default(true);
            $table->text('Opmerking')->nullable();
            $table->timestamp('DatumAangemaakt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('DatumGewijzigd')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));


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
