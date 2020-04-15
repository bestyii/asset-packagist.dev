### 运行环境
因为composer-config-plugin使用了php7.4的语法，所以要求用php7.4才能运行  
hiqdev\yii2\menus\widgets\Menu中有一处notice级错误，所以设置  
error_reporting = E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED  
mysql 8.0  
extensions
zip pdo mysqli mbstring ctype gd curl
software
git ssh zip unzip

### Create the DB in MySQL:

```sql
CREATE DATABASE asset_packagist;
CREATE USER 'asset-packagist'@'%' IDENTIFIED BY 'GOOD_PASSWORD';
GRANT ALL PRIVILEGES ON asset_packagist.* TO 'asset-packagist'@'%';
FLUSH PRIVILEGES;
```

### Create the project with composer:

```sh
composer create-project --stability=dev "haohetao/asset-packagist.dev:*" asset-packagist
```

### Make configuration tuning:

Copy `.env.example` to `.env` and adjust it:

```sh
cp .env.example
edit .env
```

Be sure to set `COOKIEVALIDATIONKEY` and `DB_PASSWORD`:

```sh
COOKIEVALIDATIONKEY=GOOD_RANDOM_STRING_HERE
DB_PASSWORD=YOUR_DB__PASSWORD
```

### Deploy the project
这个命令可以导入数据库，创建初始化文件(数据库配置，必要的目录，yii2入口文件)，也可以手工处理这些工作
我使用这个命令的时候会少创建一个文件，这个文件的模板在vendor/hiqdev/hidev-webapp/src/views/webapp/config/bootstrap.twig
可以复制为src/config/bootstrap.php
然后还要执行
```sh
composer dump-autoload
````
这条命令会根据.ENV的内容生成配置写入到vendor/hiqdev/composer-config-plugin-output目录
最后执行以下命令进行初始化
```sh
./vendor/bin/hidev deploy
```

Configure your web-server.
这个命令是创建nginx的站点配置，如果你自己配置站点，可以不执行
(hidev can install nginx config for you, run `./vendor/bin/hidev nginx/deploy`).

Try to fetch your first package from web-interface or using the following command:
以命令行方式获取包
```sh
./vendor/bin/hidev asset-package/update bower jquery
```

### Working with queues
这个队列是用于安装依懒包的，需要驻留后台一直运行，每执行1000(原来是100个)个任务会自动退出1次,需要用进程管理工具自动启动
Some operations such as package update will push tasks to queue.
Run queue to execute that tasks:

```sh
./vendor/bin/hidev queue/run
```

It is recommended to run all console commands from the same user you are running the web application
to prevent permissions problems in `web/p` directory.

### Known bugs:

Just skip yellow warnings `Couldn't read ...` - they are unimportant.

添加git访问权限(不确定是否必需)
如果站点是以www-data用户运行的，在/var/www/.ssh中创建ssh密钥并添加到github账号中

## License

This project is released under the terms of the BSD-3-Clause [license](LICENSE).
Read more [here](http://choosealicense.com/licenses/bsd-3-clause).

Copyright © 2016-2018, HiQDev (http://hiqdev.com/)
