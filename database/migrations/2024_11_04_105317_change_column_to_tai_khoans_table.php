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
            $table->renameColumn('uuid', 'uid');
            $table->dropColumn('bi_cam');
            $table->dropColumn('id_dinh_danh');
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
