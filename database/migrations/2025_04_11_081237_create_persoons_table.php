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
        Schema::create('persoons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_persoon');
            $table->string('Voornaam', 51);
            $table->string('Tussenvoegsel', 20)->nullable();
            $table->string('Achternaam', 41);
            $table->string('Roepnaam', 50);
            $table->boolean('IsVolwassen');
            $table->boolean('IsActive')->default(true);
            $table->text('Opmerking')->nullable();
            $table->dateTime('DatumAangemaakt')->useCurrent();
            $table->dateTime('DatumGewijzigd')->nullable()->useCurrentOnUpdate();
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('type_persoon')->references('id')->on('type_persoon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persoons');
    }
};
