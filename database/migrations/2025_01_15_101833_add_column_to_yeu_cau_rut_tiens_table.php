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
        Schema::table('yeu_cau_rut_tiens', function (Blueprint $table) {
            $table->string('ten_ngan_hang');
            $table->string('so_tai_khoan');
            $table->string('ma_xet_duyet');
            $table->boolean('xet_duyet')->default(0);
            $table->integer('trang_thai')->change()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yeu_cau_rut_tiens', function (Blueprint $table) {
            //
        });
    }
};
