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
        // First, remove any duplicate passport numbers if they exist
        DB::statement('DELETE t1 FROM visa_applications t1 INNER JOIN visa_applications t2 WHERE t1.id > t2.id AND t1.passport_number = t2.passport_number');
        
        Schema::table('visa_applications', function (Blueprint $table) {
            $table->unique('passport_number', 'unique_passport_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visa_applications', function (Blueprint $table) {
            $table->dropUnique('unique_passport_number');
        });
    }
};
