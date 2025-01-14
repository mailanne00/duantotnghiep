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
        Schema::table('thong_baos', function (Blueprint $table) {
            $table->foreignId('nguoi_gui_id')->nullable()->constrained('tai_khoans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('thong_baos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('nguoi_gui_id');
        });
    }
};
