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
        DB::unprepared('DROP PROCEDURE IF EXISTS WijzigBaan');

        // Create procedures
        $pathGetAllReserveringen = database_path('SP/GetAllreserveringen.sql');
        DB::unprepared(File::get($pathGetAllReserveringen));

        $pathGetAllBanen = database_path('SP/GetAllbanen.sql');
        DB::unprepared(File::get($pathGetAllBanen));

        $pathWijzigBaan = database_path('SP/WijzigBaan.sql');
        DB::unprepared(File::get($pathWijzigBaan));
    }

    public function down(): void
    {
        // Drop procedures
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllReserveringen');
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllBanen');
        DB::unprepared('DROP PROCEDURE IF EXISTS WijzigBaan');
    }
};
