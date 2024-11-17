<?php

use App\Models\PhongChat;
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
        Schema::table('to_caos', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\PhongChat::class)->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('to_caos', function (Blueprint $table) {
            $table->dropForeignIdFor(PhongChat::class);
        });
    }
};
