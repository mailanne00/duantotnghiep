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
        Schema::create('tin_nhans', function (Blueprint $table) {
            $table->id();
            $table->string('tin_nhan');
            $table->foreignId('nguoi_gui')->constrained('tai_khoans');
            $table->foreignId('nguoi_nhan')->constrained('tai_khoans');
            $table->string('trang_thai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin_nhans');
    }
};
