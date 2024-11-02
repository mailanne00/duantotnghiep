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
        Schema::table('to_caos', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('trang_thai'); // Thêm trường image_path
            $table->string('tieu_de_to_cao')->after('image_path'); // Thêm trường tieu_de_to_cao
            $table->unsignedBigInteger('id_tin_nhan')->nullable()->after('tieu_de_to_cao'); // Thêm trường id_tin_nhan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('to_caos', function (Blueprint $table) {
            $table->dropColumn(['image_path', 'tieu_de_to_cao', 'id_tin_nhan']);
        });
    }
};
