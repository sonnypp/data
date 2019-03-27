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

<div class="content content-nav-base  login-content">
    <div class="main-nav">
        <div class="inner-cont0">
            <div class="inner-cont1 w1200">
                <div class="inner-cont2">
                    <a href="<?php echo U('/commodity');?>" class="active">所有商品</a>
                    <a href="<?php echo U('/buytoday');?>">推荐商品</a>
                    <a href="<?php echo U('/info');?>">零食资讯</a>
                    <a href="<?php echo U('/annoucement');?>">零食公告</a>
                    <a href="<?php echo U('/message');?>">留言板</a>
                    <a href="<?php echo U('/about');?>">关于我们</a>
                </div>
            </div>
        </div>
    </div>
    <div class="login-bg">
        <div class="login-cont w1200">
            <div class="layui-col-md7">
                <p style="color:white">text</p>
            </div>
            <div class="layui-col-md5" style="padding-top: 100px">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <div class="layui-card-header">
                            <span>用户注册</span>
                        </div>
                        <div class="layui-card-body">
                            <form class="layui-form" lay-filter="formAddFilter">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">用户名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="user_name" placeholder="请输入用户名.." autocomplete="off" class="layui-input" required>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">密  码</label>
                                    <div class="layui-input-block">
                                        <input type="password" name="user_pw" placeholder="请输入密码.." autocomplete="off" class="layui-input" required>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">姓  名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="user_realname" placeholder="请输入真实姓名.." autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">性  别</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="user_sex" value="男" title="男">
                                        <input type="radio" name="user_sex" value="女" title="女" checked>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">手  机</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="user_tel" placeholder="请输入手机号码.." autocomplete="off" class="layui-input" required>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">Q  Q</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="user_qq" placeholder="请输入QQ.." autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">地  址</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="user_address" placeholder="请输入地址.." autocomplete="off" class="layui-input" required>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn layui-btn-lg  layui-btn-radius" lay-submit lay-filter="form_add"> 注册 </button>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <div class="layui-inline">
                                            <p> <a href="login.html" >已有账号可登陆</a>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
<script type="text/javascript">
    layui.config({
        base: '/api/Public/res/static/js/util' //你存放新模块的目录，注意，不是layui的模块目录
    }).use(['jquery','form'],function(){
        var $ = layui.$,form = layui.form;
        form.render(null,"formAddFilter");

        form.on("submit(form_add)",function(data){
           // return  layer.msg("注册成功",{icon:1,time:3000,shade:0.4},function(){
           //      window.location.href = "login.html";
           //  });
            var field = data.field;
            if(field.user_name == "" || field.user_pw == "" || field.user_tel == "" || field.user_address == "") {
                return layer.msg("数据不能为空",{icon:5,time:3000,shade:0.4},function(){
                    return false;
                });
            }

            $.post("/api/admin.php/user/add",data.field,function(result){
                // 请求处理
                if (result['code'] == 0) {
                    return layer.msg("用户注册成功",{icon:1,time:3000,shade:0.4},function(){
                         window.location.href = "login.html";
                    });
                } else if (result['code'] == 101) {
                    return layer.msg("用户已存在",{icon:5,time:3000,shade:0.4},function(){
                        return false;
                    });
                } else {
                    return layer.msg("数据请求出错",{icon:2,time:3000,shade:0.4},function(){
                        return false;
                    });
                }
            },'json');
            return false;
        })
    })
</script>

</body>
</html>