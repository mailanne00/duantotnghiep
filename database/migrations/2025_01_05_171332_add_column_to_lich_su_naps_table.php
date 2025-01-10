<?php

use App\Models\PhuongThucThanhToan;
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
            $table->dropConstrainedForeignIdFor(PhuongThucThanhToan::class);
            $table->dropColumn('ma_the_cao');
            $table->dropColumn('so_seri');
            $table->dropColumn('so_tai_khoan');
            $table->string('ten_ngan_hang')->nullable();
            $table->string('loai_nap');
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
