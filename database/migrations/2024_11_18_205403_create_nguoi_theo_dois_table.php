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
        Schema::create('nguoi_theo_dois', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoi_theo_doi_id')->constrained('tai_khoans');
            $table->foreignId('nguoi_duoc_theo_doi_id')->constrained('tai_khoans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_theo_dois');
    }
};
