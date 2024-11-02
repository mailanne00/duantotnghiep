<?php

use App\Models\DangTin;
use App\Models\TaiKhoan;
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
            $table->dropConstrainedForeignId('nguoi_thich');
            $table->dropConstrainedForeignId('nguoi_duoc_thich');
            $table->foreignIdFor(TaiKhoan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(DangTin::class)->constrained()->cascadeOnDelete();
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
