<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hire_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes(); // Thêm dòng này để sử dụng soft deletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('hire_logs');
    }
};
