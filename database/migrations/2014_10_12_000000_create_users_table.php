<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable()->comment('名称');
            $table->string('username')->nullable()->comment('用户名');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('password')->nullable()->comment('密码');
            $table->timestamp('last_login')->nullable()->comment('上次登录时间');

            $table->rememberToken();
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
