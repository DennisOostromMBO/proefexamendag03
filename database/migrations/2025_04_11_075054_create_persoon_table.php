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
        Schema::create('persoon', function (Blueprint $table) {
            $table->id();
            $table->string('TypePersoon');
            $table->string('Voornaam');
            $table->string('Tussenvoegsel')->nullable();
            $table->string('Achternaam');
            $table->string('Roepnaam');
            $table->boolean('IsVolwassen');
            $table->boolean('IsActive')->default(true);
            $table->text('Opmerking')->nullable();
            $table->timestamp('DatumAangemaakt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('DatumGewijzigd')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persoon');
    }
};
