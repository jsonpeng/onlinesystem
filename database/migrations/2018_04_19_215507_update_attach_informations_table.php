<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateAttachInformationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attach_informations', function (Blueprint $table) {
           // 判断数据表是否有该列
            if(Schema::hasColumn('attach_informations', 'info_id')){
                //删除指定字段
                $table->dropColumn('info_id');
             }

            // 判断数据表是否有该列
            if(Schema::hasColumn('attach_informations', 'num')){
                //删除指定字段
                $table->dropColumn('num');
             }

            $table->integer('num')->nullable()->default(0)->comment('权重');
            $table->integer('info_id')->unsigned();
            $table->foreign('info_id')->references('id')->on('informations');
            
            $table->index('info_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attach_informations');
    }
}
