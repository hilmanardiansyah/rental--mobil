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
        Schema::table('rentals', function (Blueprint $table) {
            $table->dateTime('return_date')->nullable(); // Menambahkan kolom return_date
            $table->decimal('late_fee', 10, 2)->default(0); // Menambahkan kolom late_fee
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn(['return_date', 'late_fee']);
        });
    }
};
