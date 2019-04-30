<?php
return array(
    //'配置项'=>'配置值'

    //自定义路径常量的配置项
    'TMPL_PARSE_STRING' =>  array(
        '__PUBLIC__'=>'/api/Public/',
        '__STATIC__'=>'/api/Public/static',
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
        "register" => "Index/register",

        'annoucement' => "Gonggao/index",
        "info" => "Information/inforlist",  //资讯

        'message' => "Liuyan/getall",
        'liuyan/add' => "Liuyan/liuyanadd",

        "commodity" => "Good/getall",  //所有零食
        "details" => "Good/detail",  //零食详情页
        "cgoods" => "Good/getbycatelog",  //根据零食类别获取零食
        "buytoday" => "Good/buytoday",  //新品推荐 热销推荐
        "goods/search" => "Good/search",

        'addcart' => "Car/addTocar",   //购物车
        "goodsplus" => "Car/plus",
        "goodsminus" => "Car/minus",
        "goodsdel" => "Car/del",
        "clear" => "Car/clear",

        "deallogin" => "Index/dealed", //用户处理登入退出
        "logout" => "Index/logout",

        "myinfo" => "User/info",//用户信息
        "myorder" => "User/order",
        "mymessage" => "User/message",
        "liuyan/mymessage" => "User/mlist",
        "liuyan/del" => "User/mdel",
        "order/myorder" => "User/olist",
        "order/view" => "User/orderdetail",
        "order/detail" => "User/odetail",
        "order/del" => "User/odel",
        "pwmodify" => "User/changepw",


        'pay/info' => 'Pay/info',   //支付路由
        'pay/confirm' => 'Pay/payview',
        'pay/res' => 'Pay/payresview',
        'pay/ress' => 'Pay/payres',
    )
);