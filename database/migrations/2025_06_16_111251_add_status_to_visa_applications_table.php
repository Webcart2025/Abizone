<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToVisaApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('visa_applications', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        });
    }

    public function down()
    {
        Schema::table('visa_applications', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}