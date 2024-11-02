<?php

use App\Models\TinNhan;
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
        Schema::create('phong_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoi_gui_id')->constrained('tai_khoans', 'id');
            $table->foreignId('nguoi_nhan_id')->constrained('tai_khoans', 'id');
            $table->foreignIdFor(TinNhan::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('phong_chats');
    }
};
