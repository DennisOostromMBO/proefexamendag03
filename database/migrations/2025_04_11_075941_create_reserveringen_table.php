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
            $table->unsignedBigInteger('persoon_id');
            $table->unsignedBigInteger('openingstijd_id');
            $table->unsignedBigInteger('baan_id');
            $table->unsignedBigInteger('pakketoptie_id')->nullable();
            $table->string('reservering_status');
            $table->string('reserveringsnummer')->unique();
            $table->date('datum');
            $table->integer('aantal_uren');
            $table->time('begin_tijd');
            $table->time('eind_tijd');
            $table->integer('aantal_volwassen');
            $table->integer('aantal_kinderen')->nullable();
            $table->timestamps();
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
