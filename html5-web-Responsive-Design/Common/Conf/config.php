<?php

$routes_static = require realpath('../') . '/Common/Common/routes_static.php'; //静态路由
$routes_dynamic = require realpath('../') . '/Common/Common/routes_dynamic.php'; //动态路由
return array(
    'URL_MODEL' => 2,
    //数据库配置
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '10.11.2.16',
    //'DB_HOST' => 'localhost',

    'DB_NAME' => 'leego_womdee',
    'DB_USER' => 'root',
    'DB_PWD' => '123123',
    //'DB_PWD' => 'root',

    'DB_PORT' => '3306',
    'DB_PREFIX' => 'womdee_',
    'URL_ROUTER_ON' => true, //开启路由
    'URL_ROUTE_RULES' => $routes_dynamic, //动态路由
    'URL_MAP_RULES' => $routes_static, //静态路由
    //控制器重命名
    'DEFAULT_C_LAYER' => 'Action',
    //允许访问的模块列表
    'MODULE_ALLOW_LIST' => array('Home', 'Api'),
    'DEFAULT_MODULE' => 'Home', // 默认模块
    //加载公共函数库
    'LOAD_EXT_FILE' => 'functions_public',
    'LOAD_EXT_CONFIG' => 'defines',
    'TAG_NESTED_LEVEL' => 8, //定义volist嵌套循环次数
    //重新定义模板路劲
    //'VIEW_PATH' => '/View/',
    'VAR_MODULE' => 'module', // 默认模块获取变量
    'VAR_CONTROLLER' => 'controller', // 默认控制器获取变量
    'VAR_ACTION' => 'action', // 默认操作获取变量
    //多语言
    'LANG_SWITCH_ON' => true, // 开启语言包功能
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'DEFAULT_LANG' => 'en_lang', // 默认语言
    'LANG_LIST' => 'en-us,it-sos,zh-cn', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE' => 'l', // 默认语言切换变量
    //错误界面
    //'TMPL_EXCEPTION_FILE' => '/Public/exception_temp.tpl',
    'COOKIE_EXPIRE' => 5 * 24 * 3600, // 5天
    // 邮箱配置
    'MAIL_CONFIG' => array(
        'host' => 'smtp.163.com',
        'port' => 25,
        'username' => '',
        'password' => '',
        'from' => '',
        'from_name' => 'lymos'
    ),
        //'SHOW_PAGE_TRACE' => 'true'
);