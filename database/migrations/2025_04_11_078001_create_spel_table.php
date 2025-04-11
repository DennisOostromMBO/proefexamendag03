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
        Schema::create('spel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persoons_id');
            $table->unsignedBigInteger('reservering_id'); // Column name stays the same
            $table->boolean('is_active')->default(true);
            $table->text('opmerking')->nullable();
            $table->timestamp('datum_aangemaakt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('datum_gewijzigd')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            $table->foreign('persoons_id')->references('id')->on('persoons')->onDelete('cascade');
            $table->foreign('reservering_id')->references('id')->on('reserveringen')->onDelete('cascade'); // Updated to reference the correct table name
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
