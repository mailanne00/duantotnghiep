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
        Schema::create('dang_tins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\TaiKhoan::class)->constrained();
            $table->string('video');
            $table->string('luot_thich');
            $table->string('noi_dung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dang_tins');
    }
};
