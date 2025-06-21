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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('mentee_id');
            $table->unsignedBigInteger('mentor_id');
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            //$table->foreignId('session_id')->constrained('mentor_sessions')->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned(); // 1 to 5
            $table->text('comment')->nullable();

            $table->foreign('mentee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('mentor_sessions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
