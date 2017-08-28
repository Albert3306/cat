<?php

use Illuminate\Database\Seeder;

class SystemConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = [
            ['name' => 'website_title', 'value' => 'CAT'],
            ['name' => 'website_keywords', 'value' => 'CAT,Albert,Albert3306'],
            ['name' => 'company_full_name', 'value' => 'CAT 内容管理系统'],
            ['name' => 'company_short_name', 'value' => 'CAT-CMS'],
            ['name' => 'company_telephone', 'value' => ''],
            ['name' => 'website_icp', 'value' => ''],
            ['name' => 'page_size', 'value' => '15'],
            ['name' => 'system_version', 'value' => 'V1.0'],
            ['name' => 'system_author', 'value' => 'Albert3306'],
            ['name' => 'system_author_website', 'value' => 'https://github.com/Albert3306/cat']
        ];

        // 循环写入系统配置
        foreach ($configs as $config) {
            DB::table('system_config')->insert($config);
        }
    }
}
