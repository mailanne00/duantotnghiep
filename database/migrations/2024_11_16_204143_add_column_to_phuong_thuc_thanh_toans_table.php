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
        Schema::table('phuong_thuc_thanh_toans', function (Blueprint $table) {
            $table->string('anh');
            $table->string('mo_ta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phuong_thuc_thanh_toans', function (Blueprint $table) {
            $table->dropColumn('anh');
            $table->dropColumn('mo_ta');
        });
    }
};
