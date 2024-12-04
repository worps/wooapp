<?php

$configWindows = [
    'server_mode' => 'Fastcgi',
    'project' => [
        'log_level' => 2, //0上线模式，1错误显示+release，2错误显示+debug+release
        'view_mode' => 'Json',
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Content-Type' => 'application/json',
        ],
    ],
];
$configLinux = [
    'server_mode' => 'SwooleHttp',
    'swoole_main' => [
        'host' => '0.0.0.0',
        'port' => 8005,
        'setting' => [
            'enable_coroutine' => true,
            'max_coroutine' => 10000,
            'worker_num' => 1,                              //工作进程数
            'pid_file' => ROOT_PATH.'/api.pid',			//保存master进程id
            'log_level' => 0,								//swoole日志级别（0DEBUG，1TRACE，2INFO，3NOTICE，4WARNING，5ERROR）
            'max_request' => 80000,                         //单个进程处理请求次数
            'enable_static_handler' => true
        ],
        'project' => [
            'log_level' => 2, //0上线模式，1错误显示+release，2错误显示+debug+release
            'view_mode' => 'Json',
            'headers' => [
                'Access-Control-Allow-Origin' => '*',
                'Content-Type' => 'application/json',
            ],
        ],
    ]
];
return IS_WIN ? $configWindows : $configLinux;