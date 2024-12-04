<?php
namespace app_main\ctrl\cron;

use \Woocan\Core\Request;
use \Woocan\Core\Factory;

class test extends base
{
    // name接受传参
    function echo($name = 'woocan')
    {
        echo "name = {$name} \n";
    }
}