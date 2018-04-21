<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateRecountInformationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recount_informations', function (Blueprint $table) {
               // 判断数据表是否有该列
            if(Schema::hasColumn('recount_informations', 'mistake_conten')){
                //删除指定字段
                $table->dropColumn('mistake_conten');
             }

            if(Schema::hasColumn('recount_informations', 'num')){
                //删除指定字段
                $table->dropColumn('num');
             }

            if(Schema::hasColumn('recount_informations', 'mistake_content')){
                $table->dropColumn('mistake_content');
            }

            if(Schema::hasColumn('recount_informations', 'mistake_type')){
                $table->dropColumn('mistake_type');
            }

            if(!Schema::hasColumn('recount_informations', 'select_id')){
                $table->integer('select_id')->nullable()->comment('选项id');
                $table->index('select_id');
            }

            if(!Schema::hasColumn('recount_informations', 'select_num')){
                $table->integer('select_num')->nullable()->comment('选项的序号');
            }

            if(!Schema::hasColumn('recount_informations', 'mistake_id')){
                $table->integer('mistake_id')->nullable()->comment('错误内容的id');
                $table->index('mistake_id');
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
