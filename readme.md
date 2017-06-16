## 简介

    基于 Laravel 5.4 开发的内容管理系统，后台模板来自于[模板之家](http://www.cssmoban.com/cssthemes/6700.shtml)

## 安装

1. 获取项目代码
    * 通过 GitHub：通过项目右侧的 [clone or download] 按钮 
    * 通过 Git   ：`git clone https://github.com/Albert3306/cat.git`

2. 安装 [composer](https://getcomposer.org/download/)
    * 安装好 composer 后，在命令行运行：`composer` 看是否安装成功
    * 进入项目目录，在命令行运行：`composer install` 安装依赖
    * 项目入口文件在项目根路径下的 `public` 文件中

3. 复制项目根路径下 .env.example 重命名为 .env 
    * 修改文件中的数据库配置和网站相关配置
    * 在命令行输入：php artisan key:generate 生成 APP_KEY

4. 数据迁移和填充
    * 命令行进入项目根路径，运行如下命令
        `php artisan migrate`
        `php artisan db:seed --class UsersTableSeeder`
    * 后台登录账号[admin] 密码[123456]

## 注

    此系统目前还处于开发阶段，很多功能还在完善中，如果有不错想法和发现问题的朋友，
    可以通过邮件 [albert3306@aliyun.com] 或在 GitHub 中给我留言。小弟入坑两年有余，菜鸟一枚，殷勤希望各位大神带飞！
