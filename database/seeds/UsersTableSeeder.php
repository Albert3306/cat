<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'      => 'admin',
            'email'         => 'admin@admin.com',
            'mobile'        => '18123690365',
            'password'      => bcrypt('123456'),
            'nickname'      => '超级管理员',
            'reg_ip'        => app('request')->ip(),
            'last_login_ip' => app('request')->ip(),
        ]);
    }
}
