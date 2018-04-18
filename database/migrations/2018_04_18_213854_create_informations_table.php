<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInformationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('题目的标题');
            $table->integer('type')->nullable()->default(0)->comment('0科目一 1科目四');
            $table->longtext('analysis')->nullable()->comment('答案分析');
            $table->integer('sort')->nullable()->default(0)->comment('排序 越大显示在越前面');
            $table->string('content')->nullable()->comment('答案内容');

            $table->index(['id', 'created_at']);
            
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
        Schema::drop('informations');
    }
}
