<?php

//项目根目录
define('ROOT_PATH', __DIR__);
//项目名称
define('APP_NAME', 'main');
//模块名称
define('MODULE_NAME', 'api');

require ROOT_PATH. '/vendor/autoload.php';
Woocan\Boot::entrance();