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
        Schema::create('lawsuits', function (Blueprint $table) {
            $table->id(); 
        
            $table->string('lawsuit_name');
            $table->string('citation');
            
            // Foreign key to courts
            $table->unsignedBigInteger('court_id');
            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');
            
            // Foreign key to applicants
            $table->unsignedBigInteger('applicant_id'); // Ensure this column is here
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            
            // Foreign key to defendants
            $table->unsignedBigInteger('defendant_id'); // Ensure this column is here
            $table->foreign('defendant_id')->references('id')->on('defendants')->onDelete('cascade');

            // Date of commencement
            $table->date('doc'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawsuits');
    }
};
