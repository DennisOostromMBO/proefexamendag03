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
        Schema::create('type_persoon', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('naam', 20); // Type of person (e.g., Klant, Medewerker, Gast)
            $table->boolean('IsActive')->default(true); // Active/inactive status
            $table->string('Opmerking', 255)->nullable(); // Optional remarks
            $table->dateTime('DatumAangemaakt')->useCurrent(); // Creation timestamp
            $table->dateTime('DatumGewijzigd')->nullable()->useCurrentOnUpdate(); // Last modified timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_persoon');
    }
};
