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
        Schema::table('users', function (Blueprint $table) {
               // Add role column with default as 'user'
            $table->enum('role', ['user', 'admin'])->default('user');
            
            // Add mobile number if it doesn't exist
            if (!Schema::hasColumn('users', 'mobilenumber')) {
                $table->string('mobilenumber')->nullable();
            }
            
            // Add google_id if it doesn't exist
            if (!Schema::hasColumn('users', 'google_id')) {
                $table->string('google_id')->nullable();
            }   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('role');
            // Only drop these if they were added by this migration
            if (Schema::hasColumn('users', 'mobilenumber')) {
                $table->dropColumn('mobilenumber');
            }
            if (Schema::hasColumn('users', 'google_id')) {
                $table->dropColumn('google_id');
            }
        });
    }
};
