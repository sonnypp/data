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

<div class="content content-nav-base shopcart-content">
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
    <div class="banner-bg w1200">
        <h3>零食购物车</h3>
        <p>爱上零食、爱上生活</p>
    </div>
    <div class="cart w1200">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
            <legend>确认订单</legend>
        </fieldset>

        <form class="layui-form" action="https://www.yeepay.com/app-merchant-proxy/node" lay-filter="confirmform" method="post">
            <div class="layui-form-item">
                <input type="hidden" name="p0_Cmd" value="<?php echo ($data['p0_Cmd']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p1_MerId" value="<?php echo ($data['p1_MerId']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p2_Order" value="<?php echo ($data['p2_Order']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p3_Amt" value="<?php echo ($data['p3_Amt']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p4_Cur" value="<?php echo ($data['p4_Cur']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p5_Pid" value="<?php echo ($data['p5_Pid']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p6_Pcat" value="<?php echo ($data['p6_Pcat']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p7_Pdesc" value="<?php echo ($data['p7_Pdesc']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p8_Url" value="<?php echo ($data['p8_Url']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="p9_SAF" value="<?php echo ($data['p9_SAF']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="pa_MP" value="<?php echo ($data['pa_MP']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="pd_FrpId" value="<?php echo ($data['pd_FrpId']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="pr_NeedResponse" value="<?php echo ($data['pr_NeedResponse']); ?>"/>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="hmac" value="<?php echo ($data['hmac']); ?>"/>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">订单号</label>
                <div class="layui-input-block">
                    <input type="text" name="p2_Order"  value="<?php echo ($data['p2_Order']); ?>" class="layui-input" readonly>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">支付金额</label>
                <div class="layui-input-block">
                    <p><h3 style="color: red"><?php echo ($data['price']); ?></h3></p>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">支付方式</label>
                <div class="layui-input-block">
                    <p><h3 style="color: green"><?php echo ($data['payway']); ?></h3></p>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="submit" class="layui-btn-primary layui-btn-fluid" value="确认支付" />
                    </div>
                </div>
            </div>


        </form>
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
        base: '/api/Public/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
    }).use(['mm','jquery','element','car','form'],function(){
        var mm = layui.mm,$ = layui.$,form = layui.form;
        form.render(null,"confirmform");
    });
</script>
</body>
</html>