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
        Schema::create('reserveringen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persoon_id')->constrained('persoons');
            $table->foreignId('openingstijd_id')->constrained('openings_tijds');
            $table->foreignId('baan_id')->constrained('baans');
            $table->foreignId('pakketoptie_id')->nullable()->constrained('pakket_opties');
            $table->string('reservering_status');
            $table->string('reserveringsnummer')->unique();
            $table->date('datum');
            $table->integer('aantal_uren');
            $table->time('begin_tijd');
            $table->time('eind_tijd');
            $table->integer('aantal_volwassen');
            $table->integer('aantal_kinderen')->nullable();
            $table->timestamp('datum_aangemaakt')->useCurrent();
            $table->timestamp('datum_gewijzigd')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserveringen');
    }
};
