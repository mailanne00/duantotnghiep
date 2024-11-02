<?php

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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('anh');
            $table->string('thong_tin');
            $table->integer('gia_tien');
            $table->string('trang_thai_player');
            $table->foreignIdFor(TaiKhoan::class)->constrained()->cascadeOnDelete();
            $table->string('so_tai_khoan');
            $table->integer('so_lan_duoc_thue')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
