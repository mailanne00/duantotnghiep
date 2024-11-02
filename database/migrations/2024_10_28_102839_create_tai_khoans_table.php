<?php

use App\Models\PhanQuyen;
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
            $table->dateTime('ngay_sinh');
            $table->string('biet_danh')->nullable();
            $table->string('gioi_tinh');
            $table->string('email')->unique();
            $table->string('sdt')->nullable();
            $table->string('cccd')->nullable();
            $table->string('mat_khau');
            $table->integer('so_du')->nullable();
            $table->string('anh_dai_dien');
            $table->boolean('bi_cam')->default(false);
            $table->foreignIdFor(PhanQuyen::class)->constrained()->cascadeOnDelete();
            $table->softDeletes();
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
