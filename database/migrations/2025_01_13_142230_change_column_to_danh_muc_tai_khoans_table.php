<?php

use App\Models\DanhMuc;
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
        Schema::table('danh_muc_tai_khoans', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(DanhMuc::class);
            $table->dropConstrainedForeignIdFor(TaiKhoan::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('danh_muc_tai_khoans', function (Blueprint $table) {
            //
        });
    }
};
