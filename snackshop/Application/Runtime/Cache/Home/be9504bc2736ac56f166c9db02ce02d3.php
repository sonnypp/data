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
            <a href="javascript:;">我的信息</a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row">
                <div class="layui-col-xs12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-card-header">
                                <span>修改密码</span>
                            </div>
                            <div class="layui-card-body" style="width: 700px">
                                <form class="layui-form" lay-filter="formAddFilter">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">原密码</label>
                                        <div class="layui-input-block">
                                            <input type="password" name="user_oldpw" placeholder="请输入旧密码..."
                                                   autocomplete="off" class="layui-input" required>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">新密码</label>
                                        <div class="layui-input-block">
                                            <input type="password" name="user_newpw" placeholder="请输入新密码..."
                                                   autocomplete="off" class="layui-input" required>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit lay-filter="form_change"> 确认修改</button>
                                        </div>
                                    </div>
                                </form>
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
    }).use(['jquery', 'form', 'layer'], function () {
        var $ = layui.$, form = layui.form, layer = layui.layer;

        form.render(null, 'formAddFilter');
        form.on('submit(form_change)', function (data) {
            var field = data.field;
            {
                if (field.user_oldpw == field.user_newpw) {
                    layer.msg("新旧密码不能相同", {icon: 5, time: 3000, shade: 0.4});
                } else {
                    $.post("/snackshop/index.php/pwmodify", field, function (result) {
                        if (field.user_oldpw == field.user_newpw) {
                            return layer.msg("新旧密码不能相同", {icon: 5, time: 3000, shade: 0.4});
                        } else {
                            if (result['code'] == 0) {
                                return layer.msg("密码修改成功，请重新登录", {icon: 1, time: 3000, shade: 0.4}, function () {
                                    window.location.href = "login.html";
                                });
                            } else if (result['code'] == 103) {
                                return layer.msg("原密码有误", {icon: 2, time: 3000, shade: 0.4}, function () {
                                    return false;
                                });
                            } else {
                                return layer.msg("数据请求出错", {icon: 2, time: 3000, shade: 0.4}, function () {
                                    return false;
                                });
                            }
                        }
                    }, 'json')
                }
                return false;
            }
        })
    });
</script>
</body>
</html>