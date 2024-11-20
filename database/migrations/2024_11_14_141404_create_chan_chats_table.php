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
        Schema::create('chan_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoi_chan')->constrained('tai_khoans');
            $table->foreignId('nguoi_bi_chan')->constrained('tai_khoans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chan_chats');
    }
};
