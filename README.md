## example使用说明

### windows环境

> 项目目录中运行`php -S 0.0.0.0:8005`启动

访问：  
// site首页  
http://127.0.0.1:8005/   
// xhprof面板  
http://127.0.0.1:8005/index.php/stats/xhprof   
// api  
http://127.0.0.1:8005/api.php/index/main  

### swoole环境

> `php 模块文件.php` 运行

访问：  
// site首页  
http://127.0.0.1:8005/   
// xhprof面板  
http://127.0.0.1:8005/stats/xhprof   
// api  
http://127.0.0.1:8005/index/main  

### 命令行脚本

php cron.php "test/echo?name=123"