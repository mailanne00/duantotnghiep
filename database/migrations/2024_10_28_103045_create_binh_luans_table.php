<?php

use App\Models\BinhLuan;
use App\Models\Player;
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
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            $table->string('noi_dung');
            $table->foreignIdFor(TaiKhoan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Player::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(BinhLuan::class)->nullable()->constrained()->cascadeOnDelete();
            $table->integer('danh_gia')->default(5);
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
        Schema::dropIfExists('binh_luans');
    }
};
