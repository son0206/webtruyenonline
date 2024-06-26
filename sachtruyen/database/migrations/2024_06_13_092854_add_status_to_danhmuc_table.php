<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToDanhmucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('danhmuc', function (Blueprint $table) {
            $table->boolean('status')->default(0); // Hoặc kiểu dữ liệu và giá trị mặc định phù hợp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('danhmuc', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
