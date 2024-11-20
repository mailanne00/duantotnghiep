<?php

use App\Models\BinhLuan;
use App\Models\Blog;
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
        Schema::create('cam_xuc_binh_luans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\TaiKhoan::class)->constrained();
            $table->string('cam_xuc');
            $table->foreignIdFor(BinhLuan::class)->constrained();
            $table->foreignIdFor(Blog::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cam_xuc_binh_luans');
    }
};
