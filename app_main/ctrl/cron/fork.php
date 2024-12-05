<?php
namespace app_main\ctrl\cron;
/**
 * 定时作业
 * 执行方法：php cron.php fork/run
 */
use \Woocan\Lib\CronManager;

class fork extends base
{
    // 作业配置，cron格式同linux的crontab配置
    const Cron_List = [
        'test/echo?name=123' => ['cron'=>'* * * * *', 'start'=>'2024-05-18 10:24', 'end'=>'2028-05-18 10:26'], //测试
    ];

    function run()
    {
        CronManager::run(self::Cron_List);
    }
}