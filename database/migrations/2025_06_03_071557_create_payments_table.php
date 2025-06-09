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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentee_id');
            $table->unsignedBigInteger('session_id');
            $table->string('provider'); // stripe, paypal ...
            $table->string('payment_reference');
            $table->decimal('amount', 8, 2);
            $table->enum('status', ['pending', 'paid', 'failed']);
            $table->timestamps();

            $table->foreign('mentee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('mentor_sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
