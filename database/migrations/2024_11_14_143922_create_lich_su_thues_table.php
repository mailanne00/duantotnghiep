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
        Schema::create('lich_su_thues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoi_thue')->constrained('tai_khoans');
            $table->foreignId('nguoi_duoc_thue')->constrained('tai_khoans');
            $table->integer('gia_thue');
            $table->integer('gio_thue');
            $table->string('trang_thai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su_thues');
    }
};
