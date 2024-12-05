<?php
namespace app_main\midware;

use \Woocan\Core\Context;
use \Woocan\Core\Response;
use Woocan\Core\Interfaces\Midware as IMidware;

/**
 * 计算接口耗时
 */
class costtime implements IMidware
{
    // 中间件初始化
    public function initial($config)
    {
        // 可以使用Woocan\Core\Table::create初始化swoole_table，用于记录数据
    }

    // 开始请求
    function start($params)
    {
        Context::set('mid_start_time', microtime(true));
    }

    // 结束请求
    function end($response)
    {
        $start = Context::get('mid_start_time');
        $cost = microtime(true) - $start;

        Response::header(['X-Cost-Time' => $cost]);
    }
}