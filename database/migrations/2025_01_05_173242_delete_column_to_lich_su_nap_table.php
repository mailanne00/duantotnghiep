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
            $table->dropColumn('ten_ngan_hang');
            $table->dropColumn('loai_nap');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lich_su_naps', function (Blueprint $table) {
            $table->string('ten_ngan_hang')->nullable();
        });
    }
};
