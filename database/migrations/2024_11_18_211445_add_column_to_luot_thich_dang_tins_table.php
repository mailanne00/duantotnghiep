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
        Schema::table('luot_thich_dang_tins', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\TaiKhoan::class)->change()->constrained();
            $table->foreignIdFor(\App\Models\DangTin::class)->change()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('luot_thich_dang_tins', function (Blueprint $table) {
            //
        });
    }
};
