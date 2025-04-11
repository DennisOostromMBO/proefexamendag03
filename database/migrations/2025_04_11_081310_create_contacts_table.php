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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('PersoonId'); // Foreign key to Persoon.Id
            $table->string('Mobiel', 255); // Mobile phone number
            $table->string('Email', 255); // Email address
            $table->string('Opmerking', 255)->nullable(); // Optional remarks
            $table->dateTime('DatumAangemaakt')->useCurrent(); // Creation timestamp
            $table->dateTime('DatumGewijzigd')->nullable()->useCurrentOnUpdate(); // Last modified timestamp
            $table->boolean('IsActive')->default(true); // Active/inactive status
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('PersoonId')->references('id')->on('persoons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts'); // Updated to match the renamed table
    }
};
