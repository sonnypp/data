<?php
return array(
    //'配置项'=>'配置值'

    //自定义路径常量的配置项
    'TMPL_PARSE_STRING' =>  array(
        '__STATIC__'=>'/api/Public/static',
        '__UPLOAD__'=>'/api/Pulic/upload'
    ),

    //设置默认允许访问模块
    'MODULE_ALLOW_LIST' => array('Admin','Home'),
    //设置默认访问模块
    'DEFAULT_MODULE' => 'Admin' ,
    //设置默认访问控制器
    'DEFAULT_CONTROLLER' => 'Index',
    //设置默认访问方法

    //开启页面Trace
    'SHOW_PAGE_TRACE' => TRUE ,

//    'LAYOUT_ON' => TRUE,
//    'LAYOUT_NAME' => 'layout',



    'URL_ROUTER_ON' => TRUE, //开启路由
    'URL_ROUTE_RULES' => array(
        'index' => 'Index/index',
        'test1' => 'Index/test1',
        'test2' => 'Index/test2',

        'login'=> 'Admin/login', //管理员登录

        'user/add' => 'User/uadd',   //用户路由
        'user/list' => 'User/ulist',
        'user/del' => 'User/udelete',
        'user/modify' => 'User/umodify',
        'user/getuser' => 'User/getuser',

        'cate/list' => 'Catelog/clist', //零食类别
        'cate/add' => 'Catelog/cadd',
        'cate/modify' => 'Catelog/cmodify',
        'cate/del' => 'Catelog/cdel',
        'good/sort' => 'Catelog/cflist',

        'gonggao/list' => 'Gonggao/glist',  //公告
        'gonggao/add' => 'Gonggao/gadd',
        'gonggao/del' => 'Gonggao/gdel',

        'liuyan/list' => 'Liuyan/llist',  //留言
        'liuyan/del' => 'Liuyan/ldel',
        'liuyan/confirm' => 'Liuyan/lconfirm',

        'order/list' => 'Order/olist',  //订单
        'order/modify' => 'Order/omodify',
        'order/detail' => 'Order/odetail',
        'order/del' => 'Order/odel',

        'good/list' => 'Goods/flist', //零食
        'good/add' => 'Goods/fadd',
        'good/modify' => 'Goods/fmodify',
        'good/del' => 'Goods/fdel',
        'good/shelf' => 'Goods/fshangjia',

        'pic/upload' => 'Goods/upload',  //食物与资讯的图片接口
        'image/upload' => 'Picture/upload', //商城图片管理的图片上传接口


        'information/add' => 'Information/iadd',   //资讯
        'information/modify' => 'Information/imodify',
        'information/list' => 'Information/ilist',
        'information/del' => 'Information/idel',

        'banner1/list' => 'Picture/banner1',   //首页banner1路由
        'banner1/add' => 'Picture/addbanner1',
        'banner1/modify' => 'Picture/modifybanner1',
        'banner1/del' => 'Picture/delbanner1',

        'banner2/list' => 'Picture/banner2',   //首页banner2路由
        'banner2/add' => 'Picture/addbanner2',
        'banner2/modify' => 'Picture/modifybanner2',
        'banner2/del' => 'Picture/delbanner2',

        'banner3/list' => 'Picture/banner3',  //首页banner3路由
        'banner3/add' => 'Picture/addbanner3',
        'banner3/modify' => 'Picture/modifybanner3',
        'banner3/del' => 'Picture/delbanner3',

        'recbanner/list' => 'Picture/recommendbanner',  //推荐页banner路由
        'recbanner/add' => 'Picture/addrecbanner',
        'recbanner/modify' => 'Picture/modifyrecbanner',
        'recbanner/del' => 'Picture/delrecbanner',

        'logo/list' => 'Picture/logo',   //logo路由
        'logo/add' => 'Picture/addlogo',
        'logo/modify' => 'Picture/modifylogo',
        'logo/del' => 'Picture/dellogo',

        'data/sales' => 'Data/sales',
        'data/salesvolume' => 'Data/salesvolume',

        'film/list' => 'Film/flist',  //宣传片路由
        'film/modify' => 'Film/fmodify',
        'film/del' => 'Film/fdele',
        'film/add' => 'Film/fadd',
    )

);