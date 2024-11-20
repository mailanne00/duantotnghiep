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
        Schema::create('danh_muc_tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\DanhMuc::class)->constrained();
            $table->foreignIdFor(\App\Models\TaiKhoan::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_muc_tai_khoans');
    }
};
