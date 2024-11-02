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
        Schema::table('tai_khoans', function (Blueprint $table) {
            $table->string('id_dinh_danh')->after('bi_cam'); // Thêm cột id_dinh_danh
        });
    }

    public function down(): void
    {
        Schema::table('tai_khoans', function (Blueprint $table) {
            $table->dropColumn('id_dinh_danh'); // Xóa cột nếu cần
        });
    }
};
