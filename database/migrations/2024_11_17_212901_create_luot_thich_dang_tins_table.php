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
        Schema::create('luot_thich_dang_tins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\TaiKhoan::class);
            $table->foreignIdFor(\App\Models\DangTin::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luot_thich_dang_tins');
    }
};
