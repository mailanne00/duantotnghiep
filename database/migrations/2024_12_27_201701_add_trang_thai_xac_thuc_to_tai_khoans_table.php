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
        $table->boolean('trang_thai_xac_thuc')->default(false)->after('anh_dai_dien');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tai_khoans', function (Blueprint $table) {
            //
        });
    }
};