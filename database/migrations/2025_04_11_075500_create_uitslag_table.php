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
        Schema::create('uitslag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SpelId');
            $table->integer('Aantalpunten')->nullable();
            $table->boolean('IsActive')->default(true);
            $table->text('Opmerking')->nullable();
            $table->timestamp('DatumAangemaakt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('DatumGewijzigd')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraint
            $table->foreign('SpelId')->references('id')->on('spel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uitslag');
    }
};
