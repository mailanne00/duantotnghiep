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
            $table->string('logo')->nullable();
            $table->boolean('trang_thai')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phuong_thuc_thanh_toans', function (Blueprint $table) {
            //
        });
    }
};
