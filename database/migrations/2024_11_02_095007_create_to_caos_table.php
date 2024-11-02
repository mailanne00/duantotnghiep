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
        Schema::create('to_caos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nguoi_dung');
            $table->unsignedBigInteger('id_player');
            $table->text('noi_dung_to_cao');
            $table->enum('trang_thai', ['Chờ xử lí', 'Đang xử lí', 'Thành công', 'Thất bại'])->default('Chờ xử lí');
            $table->foreign('id_nguoi_dung')->references('id')->on('tai_khoans')->onDelete('cascade');
            $table->foreign('id_player')->references('id')->on('tai_khoans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_caos');
    }
};
