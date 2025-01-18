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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Pengguna yang menyewa
            $table->foreignId('car_id')->constrained()->onDelete('cascade');   // Mobil yang disewa
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_cost', 10, 2)->nullable();  // Total biaya (dihitung saat pengembalian)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
