<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Kiểm tra xem cột 'uuid' đã tồn tại chưa
        if (!Schema::hasColumn('tai_khoans', 'uuid')) {
            Schema::table('tai_khoans', function (Blueprint $table) {
                $table->uuid('uuid')->nullable()->unique()->after('id'); // Thêm cột uuid nếu chưa tồn tại
            });
        }
    
        // Cập nhật tất cả các bản ghi hiện tại để có giá trị UUID
        DB::table('tai_khoans')->whereNull('uuid')->update(['uuid' => DB::raw('UUID()')]);
    }
    


    public function down()
    {
        Schema::table('tai_khoans', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
    

};
