<?php

use App\Models\DanhMuc;
use App\Models\Player;
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
        Schema::create('danh_muc_players', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Player::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(DanhMuc::class)->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_muc_players');
    }
};
