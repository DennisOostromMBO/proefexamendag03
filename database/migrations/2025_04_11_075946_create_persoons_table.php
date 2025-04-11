<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('persoons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_persoon_id')->constrained('type_persoons');
            $table->string('voornaam');
            $table->string('tussenvoegsel')->nullable();
            $table->string('achternaam');
            $table->string('roepnaam');
            $table->boolean('is_volwassen')->default(true);
            $table->boolean('is_active')->default(true);
            $table->text('opmerking')->nullable();
            $table->timestamp('datum_aangemaakt')->useCurrent();
            $table->timestamp('datum_gewijzigd')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persoons');
    }
};