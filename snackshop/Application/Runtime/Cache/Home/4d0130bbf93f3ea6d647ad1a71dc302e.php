<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>零食商城</title>
    <link rel="stylesheet" type="text/css" href="/api/Public/res/static/css/main.css">
    <link rel="stylesheet" type="text/css" href="/api/Public/res/layui/css/layui.css">
    <script type="text/javascript" src="/api/Public/res/layui/layui.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <style>

        .pages a,.pages span {
            display:inline-block;
            padding:2px 5px;
            margin:0 1px;
            border:1px solid #f0f0f0;
            -webkit-border-radius:3px;
            -moz-border-radius:3px;
            border-radius:3px;
        }
        .pages a,.pages li {
            display:inline-block;
            list-style: none;
            text-decoration:none; color:#58A0D3;
        }
        .pages a.first,.pages a.prev,.pages a.next,.pages a.end{
            margin:0;
        }
        .pages a:hover{
            border-color:#50A8E6;
        }
        .pages span.current{
            background:#50A8E6;
            color:#FFF;
            font-weight:700;
            border-color:#50A8E6;
        }
    </style>
</head>
<body>

<div class="site-nav-bg">
    <div class="site-nav w1200">
        <p class="sn-back-home">
            <i class="layui-icon layui-icon-home"></i>
            <a href=<?php echo U('Index/index');?>>首页</a>
        </p>
        <div class="sn-quick-menu">
            <?php if($user == null): ?><div class="login"><a href="<?php echo U('/login');?>">登录</a></div>
                <div class="sp-cart"><a href="<?php echo U('/shopcart');?>">购物车</a><span><?php if($num == 0): ?>0 <?php else: ?> <?php echo ($num); endif; ?></span></div>
                <?php else: ?>
                     <div class="login">欢迎<a href="<?php echo U('/logout');?>"><?php echo ($user["user_name"]); ?></a></div>
                     <div class="login"><a href="<?php echo U('/myorder');?>">我的订单</a> </div>
                     <div class="login"><a href="<?php echo U('/mymessage');?>">我的留言</a> </div>
                     <div class="login"><a href="<?php echo U('/myinfo');?>">修改密码</a> </div>
                     <div class="sp-cart"><a href="<?php echo U('/shopcart');?>">购物车</a><span><?php if($num == 0): ?>0 <?php else: ?> <?php echo ($num); endif; ?></span></div><?php endif; ?>

        </div>
    </div>
</div>



<div class="header">
    <div class="headerLayout w1200">
        <div class="headerCon">
            <h1 class="mallLogo">
                <a href="#" title="零食商城">
                    <img src="/api/Public/<?php echo ($logo_img); ?>">
                </a>
            </h1>
            <div class="mallSearch">
                <form action="" class="layui-form" novalidate>
                    <input type="text" name="title" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">
                        <i class="layui-icon layui-icon-search"></i>
                    </button>
                    <input type="hidden" name="" value="">
                </form>
            </div>
        </div>
    </div>
</div>


<div class="content content-nav-base datails-content">
    <div class="main-nav">
        <div class="inner-cont0">
            <div class="inner-cont1 w1200">
                <div class="inner-cont2">
                    <a href="<?php echo U('/commodity');?>" class="active">所有零食</a>
                    <a href="<?php echo U('/buytoday');?>">零食推荐</a>
                    <a href="<?php echo U('/info');?>">零食资讯</a>
                    <a href="<?php echo U('/annoucement');?>">零食公告</a>
                    <a href="<?php echo U('/message');?>">留言板</a>
                    <a href="<?php echo U('/about');?>">关于我们</a>
                </div>
            </div>
        </div>
    </div>
    <div class="data-cont-wrap w1200">
        <div class="crumb">
            <a href="javascript:;">用户</a>
            <span>></span>
            <a href="javascript:;">我的留言</a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row">
                <div class="layui-col-xs12">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <span>我的留言列表</span>
                            </a>
                        </div>
                        <div class="layui-card-body">
                            <div class="layui-card-header">
                            </div>

                            <div class="layui-card-body">
                                <table class="layui-hide" id="messagelist" lay-filter="messagelist"></table>
                                <!--  前端动态表格工具栏--->
                                <script type="text/html" id="messageBar">
                                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-clear">

        </div>
    </div>
</div>


<div class="footer">
    <div class="mod_help w1200">
        <p>
            <a href="javascript:;">关于我们</a>
            <span>|</span>
            <a href="javascript:;">帮助中心</a>
            <span>|</span>
            <a href="javascript:;">售后服务</a>
            <span>|</span>
            <a href="javascript:;">零食资讯</a>
            <span>|</span>
            <a href="javascript:;">关于货源</a>
        </p>
    </div>
</div>


<script>

    layui.config({
        base: '/api/Public/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
    }).use(['mm','laypage','jquery','table'],function(){
        var $ = layui.$,table = layui.table;
        //动态创建表格
        table.render({
            //选择表格的id
            elem: '#messagelist',
            //选择表格调用的接口，该接口返回数据类型为json，同时默认向该接口传送分页等信息，详情见后端TP代码
            url: "/snackshop/index.php/liuyan/mymessage",
            title: '留言列表',
            //此ID用于数据表格重载时使用，比如进行查询需要重载表格数据
            id: 'messagelist',
            //表格样式，隔行换色
            even: true,
            //表头部分
            cols: [[
                {field: 'liuyan_id', title: 'ID', width: 40, fixed: 'left', unresize: true, sort: true, align: 'center'},
                {field: 'liuyan_title', title: '留言标题', width: 130, align: 'center'},
                {field: 'liuyan_content', title: '留言内容', width: 100, align: 'center'},
                {field: 'liuyan_date', title: '留言时间', width: 180, align: 'center'},
                {field: 'liuyan_isok', title: '受理情况', width: 100, align: 'center',templet:function(d){
                        if(d.liuyan_isok == '0') {
                            return '<p class="layui-bg-orange">待审核</p>';
                        }else if(d.liuyan_isok == '1'){
                            return '<p class="layui-bg-green">审核通过</p>';
                        } else if(d.liuyan_isok == '2') {
                            return '<p class="layui-bg-red">不通过</p>'
                        }
                    }},
                {fixed: 'right', title: '操作', toolbar: '#messageBar', align: 'center'}
            ]],
            //开启分页
            page: true,
            //默认每页10条数据
            limit: 10,
        });

        //工具栏监听事件
        table.on('tool(messagelist)', function (obj) {
            var data = obj.data;
            // console.log(data);
            if (obj.event === 'del') {
                layer.confirm('真的删除行么', function (index) {
                    $.post("/snackshop/index.php/liuyan/del", data, function(result) {
                        // 请求处理
                        if(result['code'] == 0) {
                            layer.msg("删除成功",{'icon':1});
                            obj.del();
                            layer.close(index);
                        } else {
                            layer.msg("删除失败",{'icon':2});
                        }
                    },'json');

                });
            }
        });

    });
</script>
</body>
</html>