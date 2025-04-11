<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('baans', function (Blueprint $table) {
            $table->id();
            $table->integer('nummer');
            $table->boolean('heeft_hek')->default(false);
            $table->boolean('is_active')->default(true);
            $table->text('opmerking')->nullable();
            $table->timestamp('datum_aangemaakt')->useCurrent();
            $table->timestamp('datum_gewijzigd')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('baans');
    }
};
