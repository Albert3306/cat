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
            $table->increments('id')->comment('ID');
            $table->string('username',32)->unique()->comment('账号');
            $table->string('email',32)->unique()->comment('邮箱');
            $table->string('mobile',20)->unique()->comment('手机号');
            $table->char('password',60)->comment('密码');
            $table->string('nickname',32)->unique()->comment('昵称');
            $table->integer('login', false, true)->unsigned()->default(0)->comment('登录次数');
            $table->timestamp('reg_at')->comment('注册时间');
            $table->ipAddress('reg_ip',50)->comment('注册IP');
            $table->timestamp('last_login_at')->comment('最后一次登录时间');
            $table->ipAddress('last_login_ip', 50)->comment('最后一次登录IP');
            $table->tinyInteger('is_locked', false, true)->default(0)->comment('是否锁定');
            $table->tinyInteger('type', false, true)->default(1)->comment('账号注册类型 1：账号 2：邮箱 3：手机');
            $table->rememberToken();
            $table->timestamp('updated_at');
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
