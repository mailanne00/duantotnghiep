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
            $table->string('cccd')->nullable()->after('sdt'); // Thêm cột cccd sau cột sdt
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tai_khoans', function (Blueprint $table) {
            $table->dropColumn('cccd'); // Xóa cột cccd khi rollback
        });
    }
};