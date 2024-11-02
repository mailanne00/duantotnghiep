<?php

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
        Schema::create('dang_tins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TaiKhoan::class)->constrained()->cascadeOnDelete();
            $table->string('video');
            $table->string('noi_dung');
            $table->boolean('trang_thai')->default(true);
            $table->softDeletes();
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
