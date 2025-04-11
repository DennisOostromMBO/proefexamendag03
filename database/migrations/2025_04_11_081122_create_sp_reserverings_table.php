<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the procedure if it already exists
        DB::unprepared('DROP PROCEDURE IF EXISTS GetUitslagenByReservering');

        // Load the SQL file and execute it
        $path = database_path('sp/reservering/spGetUitslagenByReservering.sql');
        $sql = File::get($path);
        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the procedure
        DB::unprepared('DROP PROCEDURE IF EXISTS GetUitslagenByReservering');
    }
};
