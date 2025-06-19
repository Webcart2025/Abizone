<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visa_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('application_id')->unique();
            
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('pan_card_number')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('landmark')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('passport_first_page')->nullable();
            $table->string('passport_last_page')->nullable();
            $table->string('photo')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('return_ticket')->nullable();
            $table->string('hotel_details')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('visa_applications');
    }
};
