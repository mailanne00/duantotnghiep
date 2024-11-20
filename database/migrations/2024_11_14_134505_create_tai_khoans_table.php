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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->date('ngay_sinh');
            $table->string('gioi_tinh');
            $table->string('dia_chi');
            $table->string('email');
            $table->string('sdt')->nullable();
            $table->string('cccd')->nullable();
            $table->foreignIdFor(\App\Models\PhanQuyen::class)->constrained();
            $table->string('so_du')->default(0);
            $table->boolean('bi_cam')->default(false);
            $table->string('anh_dai_dien')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
