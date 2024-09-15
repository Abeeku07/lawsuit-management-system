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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();  // Primary key (unsignedBigInteger)
            $table->string('name');  // Applicant's name
            $table->string('email');  // Applicant's email, must be unique
            $table->string('phone');  // Applicant's phone number
            $table->timestamps();  // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');  // Drop the applicants table if it exists
    }
};