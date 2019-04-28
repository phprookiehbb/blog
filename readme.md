> 学习之作，还有很多很完善的地方，会逐渐修改，巩固学习

## 简介
闲暇之时学习laravel后开发了一个个人博客用来整理技能知识；
一来把学习的只是付之于实践，二来也用来个人博客使用，整理知识；
后台的功能没有完善的权限管理功能，只简单的用于前台的管理。
此博客程序后台页面以及逻辑代码的都由我手工打造；没有版权限制；可以随意折腾，前台来自[孟坤博客 ](https://mkblog.cn/ "孟坤博客 ")；

博客大致如下图所示，简洁，美观：
![](https://i.loli.net/2019/04/28/5cc54f04894c4.png)

![](https://i.loli.net/2019/04/28/5cc54ef3a07d8.png)

## 安装

```
//下载文件
git clone https://github.com/phprookiehbb/blog.git
进入目录
cd blog
//复制配置文件
cp .env.example .env  
```
然后编辑.env文件

APP_NAME 就是自己的项目名称比如`test博客`；

APP_URL 就是我们的项目链接比如说我的 `http://test.test`；

DB_DATABASE 就是我们的数据库名比如说 `laravelblog`；

DB_USERNAME 数据库用户名比如说 `root` ；

DB_PASSWORD 数据库密码比如说 *** ；
```
//使用 composer 
composer install  
//生成 key 
php artisan key:generate  
//生成数据表
php artisan migrate  
//生成初始化的数据
php artisan db:seed  

php artisan storage:link
//清空缓存
php artisan cache:clear
```
## 进入后台
后台默认地址为：域名+blog

用户名：test@qq.com

密码：123456

  