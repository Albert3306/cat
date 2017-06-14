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
            'nickname'      => 'admin',
            'reg_at'        => date('Y-m-d H:s:i'),
            'reg_ip'        => '127.0.0.1',
            'last_login_at' => date('Y-m-d H:s:i'),
            'last_login_ip' => '127.0.0.1',
            'updated_at'    => date('Y-m-d H:s:i'),
        ]);
    }
}
