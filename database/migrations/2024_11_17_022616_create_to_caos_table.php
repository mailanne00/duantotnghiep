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
        Schema::create('to_caos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoi_to_cao')->constrained('tai_khoans');
            $table->foreignId('nguoi_bi_to_cao')->constrained('tai_khoans');
            $table->foreignIdFor(\App\Models\LichSuThue::class)->constrained();
            $table->string('anh_bang_chung');
            $table->string('ly_do');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_caos');
    }
};
