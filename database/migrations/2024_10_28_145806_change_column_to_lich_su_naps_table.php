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
        Schema::table('lich_su_naps', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\TaiKhoan::class)->change()->constrained();
            $table->foreignIdFor(\App\Models\PhuongThucThanhToan::class)->change()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lich_su_naps', function (Blueprint $table) {
            //
        });
    }
};
