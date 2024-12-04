<?php
namespace app_main\ctrl\cron;

use \Woocan\Core\Request;
use \Woocan\Core\Factory;
/**
 * 作业基类
 */
class base
{
    use \Woocan\AppBase\Api
    {
        //成员别称
        before as _before;
        after as _after;
    }

    //是否锁定以保证只有一个作业同时运行
    const Lock = true;


    /* 调用方法前 */
    function before($queryData)
    {
        //前置中间件等系统检查
        if ($checkRet = $this->_before($queryData)) {
            return $checkRet;
        }

        //加锁，相同参数的进程，只能运行一个
        $lockKey = Request::getCtrl(). '-'. Request::getMethod();
        if (static::Lock && $this->getLock()->Lock(0, $lockKey) == false) {
            throw new \Exception('cronjob '. $lockKey. ' is running');
        }

        printf('[%s][%s] start...%s', date('m-d H:i:s'), $lockKey, "\n");

        return null;
    }

    /* 调用后 */
    public function after($queryData, $viewModel)
    {
        $lockKey = Request::getCtrl(). '-'. Request::getMethod();
        static::Lock && $this->getLock()->unlock(0, $lockKey);

        printf('[%s][%s] end%s', date('m-d H:i:s'), $lockKey, "\n");

        return $this->_after($queryData, $viewModel);
    }

    /* 锁 */
    protected function getLock()
    {
        $config = C('lock');
        $obj = Factory::getInstance('\\Woocan\\Lock\\', $config);
        return $obj;
    }
}