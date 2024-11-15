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
        Schema::create('lich_su_naps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\TaiKhoan::class)->constrained();
            $table->foreignIdFor(\App\Models\PhuongThucThanhToan::class)->constrained();
            $table->string('ma_the_cao');
            $table->string('so_seri');
            $table->string('so_tai_khoan');
            $table->string('trang_thai');
            $table->string('so_tien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su_naps');
    }
};
