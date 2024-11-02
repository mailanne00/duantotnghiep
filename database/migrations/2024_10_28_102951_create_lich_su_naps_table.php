<?php

use App\Models\PhuongThucThanhToan;
use App\Models\TaiKhoan;
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
            $table->foreignIdFor(TaiKhoan::class);
            $table->foreignIdFor(PhuongThucThanhToan::class);
            $table->string('anh')->nullable();
            $table->string('ma_the_cao')->nullable();
            $table->string('so_seri')->nullable();
            $table->string('so_tai_khoan')->nullable();
            $table->boolean('trang_thai_thanh_toan');
            $table->integer('so_tien');
            $table->softDeletes();
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
