<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPublisherIdToDanhmucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('danhmuc', function (Blueprint $table) {
            $table->unsignedBigInteger('publisher_id')->nullable(); // Kiểu dữ liệu và thuộc tính phù hợp
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
            $table->dropColumn('publisher_id');
        });
    }
}
