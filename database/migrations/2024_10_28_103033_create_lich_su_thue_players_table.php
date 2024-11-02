<?php

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
        Schema::create('lich_su_thue_players', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TaiKhoan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Player::class)->constrained()->cascadeOnDelete();
            $table->string('gia_player');
            $table->string('gio_thue');
            $table->string('trang_thai_thue')->default('đang chờ xử lí');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su_thue_players');
    }
};
