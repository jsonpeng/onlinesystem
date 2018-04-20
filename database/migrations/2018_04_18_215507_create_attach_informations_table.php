<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachInformationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attach_informations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('type')->default('A')->comment('ABCDEF');
            $table->string('content')->nullable()->comment('内容');


            //$table->integer('info_id')->nullable()->comment('题目id');

           

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
        Schema::drop('attach_informations');
    }
}
