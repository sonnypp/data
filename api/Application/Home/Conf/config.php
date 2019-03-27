<?php
return array(
    //'配置项'=>'配置值'

    //自定义路径常量的配置项
    'TMPL_PARSE_STRING' =>  array(
        '__PUBLIC__'=>'/api/Public/',
    ),
    //设置默认拒绝访问模块
//    'MODULE_DENY_LIST' => array('Common','Runtime'),
    //设置默认允许访问模块
    'MODULE_ALLOW_LIST' => array('Admin','Home'),
    //设置默认访问模块
    'DEFAULT_MODULE' => 'Home' ,
    //设置默认访问控制器
    'DEFAULT_CONTROLLER' => 'Index',
    //设置默认访问方法

    //开启页面Trace
    'SHOW_PAGE_TRACE' => TRUE ,
    'URL_ROUTER_ON' => TRUE,   //开启路由
    'URL_ROUTE_RULES' => array(  //定义路由规则
//        "index" => "Index/index",

        "about" => "Index/about",
        "shopcart" => "Index/shopcart",
        "login" => "Index/login",

        'annoucement' => "Gonggao/index",
        "info" => "Information/inforlist",  //资讯
        'message' => "Liuyan/getall",

        "commodity" => "Good/getall",
        "details" => "Good/detail",
        "cgoods" => "Good/getbycatelog",
        "buytoday" => "Good/buytoday",

        'addcart' => "Car/addTocar",
        "goodsplus" => "Car/plus",
        "goodsminus" => "Car/minus",
        "goodsdel" => "Car/del",
        "clear" => "Car/clear"
    )
);