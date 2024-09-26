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
        // Rename the 'job_listing' table to 'job_listings'
        Schema::rename('job_listing', 'job_listings');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to 'job_listing' if the migration is rolled back
        Schema::rename('job_listings', 'job_listing');
    }
};
