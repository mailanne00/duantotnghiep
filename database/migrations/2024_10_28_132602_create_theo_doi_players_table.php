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
        Schema::create('theo_doi_players', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TaiKhoan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Player::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theo_doi_players');
    }
};
