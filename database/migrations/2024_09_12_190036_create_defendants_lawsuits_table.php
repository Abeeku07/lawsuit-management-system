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
        Schema::create('defendants_lawsuit', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->unsignedBigInteger('defendant_id');  // Foreign key to defendants table
            $table->unsignedBigInteger('lawsuit_id');  // Foreign key to lawsuits table

            // Foreign key constraints
            $table->foreign('defendant_id')->references('id')->on('defendants')->onDelete('cascade');
            $table->foreign('lawsuit_id')->references('id')->on('lawsuits')->onDelete('cascade');

            $table->timestamps();  // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defendants_lawsuit');
    }
};