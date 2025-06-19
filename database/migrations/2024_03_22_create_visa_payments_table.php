<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visa_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visa_applicationss_id')->constrained('visa_applicationss')->onDelete('cascade');
            $table->string('visa_type');
            $table->decimal('amount', 10, 2);
            $table->integer('duration_days');
            $table->date('travel_date');
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visa_payments');
    }
}; 