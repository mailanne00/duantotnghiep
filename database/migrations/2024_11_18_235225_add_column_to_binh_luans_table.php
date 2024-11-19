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
        Schema::table('binh_luans', function (Blueprint $table) {
            $table->dropForeign(['binh_luan_id']);
            $table->foreignId('binh_luan_id')->nullable()->change();
            $table->foreign('binh_luan_id')->references('id')->on('binh_luans')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            $table->dropForeign(['binh_luan_id']);
            $table->foreignId('binh_luan_id')->nullable(false)->change();
            $table->foreign('binh_luan_id')->references('id')->on('binh_luans')->cascadeOnDelete();
        });
    }
};
