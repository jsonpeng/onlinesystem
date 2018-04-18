<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecountInformationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recount_informations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('result')->nullable()->comment('0对 1错');
            $table->string('mistake_type')->nullable()->comment('错误类型选项（ABCDEF）');
            $table->string('mistake_conten')->nullable()->comment('错误内容');
            $table->integer('times')->nullable()->comment('答题的次数');
            $table->integer('num')->nullable()->comment('答题的序号');


            $table->integer('user_id')->nullable()->comment('参与用户的id');
            $table->integer('info_id')->nullable()->comment('题目id');

            $table->index('user_id');
            $table->index('info_id');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recount_informations');
    }
}
