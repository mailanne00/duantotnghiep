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
            $table->string('ngay_sinh')->nullable()->change();
            $table->string('gioi_tinh')->nullable()->change();
            $table->string('dia_chi')->nullable()->change();
            $table->unsignedBigInteger('phan_quyen_id')->default(2)->change();
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
