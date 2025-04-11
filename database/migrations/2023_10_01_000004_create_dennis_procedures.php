<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    public function up(): void
    {
        // Drop existing procedures
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllReserveringen');
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllBanen');

        // Create procedures
        $pathGetAllReserveringen = database_path('SP/GetAllreserveringen.sql');
        DB::unprepared(File::get($pathGetAllReserveringen));

        $pathGetAllBanen = database_path('SP/GetAllbanen.sql');
        DB::unprepared(File::get($pathGetAllBanen));
    }

    public function down(): void
    {
        // Drop procedures
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllReserveringen');
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllBanen');
    }
};
