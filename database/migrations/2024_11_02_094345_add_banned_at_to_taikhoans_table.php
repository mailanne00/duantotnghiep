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
    Schema::table('tai_khoans', function (Blueprint $table) {
        $table->timestamp('banned_at')->nullable()->after('sdt');
    });
}

public function down()
{
    Schema::table('tai_khoans', function (Blueprint $table) {
        $table->dropColumn('banned_at');
    });
}

};