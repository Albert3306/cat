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
            $table->string('username',32)->unique();
            $table->string('email',32)->unique();
            $table->string('mobile',20)->unique();
            $table->char('password',60);
            $table->string('nickname',32)->unique();
            $table->integer('login', false, true)->unsigned()->default(0);
            $table->timestamp('reg_at');
            $table->ipAddress('reg_ip');
            $table->timestamp('last_login_at');
            $table->ipAddress('last_login_ip');
            $table->tinyInteger('is_locked', false, true)->unsigned()->default(0);
            $table->tinyInteger('type', false, true)->unsigned();
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
