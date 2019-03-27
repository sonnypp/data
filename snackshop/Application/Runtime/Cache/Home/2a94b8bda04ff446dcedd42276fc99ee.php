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


<div class="content">
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
    <div class="category-con">
        <div class="category-inner-con w1200">
            <div class="category-type">
                <h3>全部分类</h3>
            </div>
            <div class="category-tab-content">
                <div class="nav-con">
                    <ul class="normal-nav layui-clear">
                        <?php if(is_array($catelog)): foreach($catelog as $key=>$vo): ?><li class="nav-item">
                                <div class="title"><?php echo ($vo["catelog_name"]); ?></div>
                                <p><a href="<?php echo U('/cgoods',array(catelog_id=>$vo['catelog_id']));?>"><?php echo ($vo["catelog_name"]); ?></a></p>
                                <i class="layui-icon layui-icon-right"></i>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="category-banner">
            <div class="w1200">
                <img src="/api/Public/<?php echo ($index_img); ?>">
            </div>
        </div>
    </div>
    <div class="floors">
        <div class="sk">
            <div class="sk_inner w1200">
                <div class="sk_hd">
                    <a href="javascript:;">
                        <img src="/api/Public/res/static/img/s_img1.jpg">
                    </a>
                </div>
                <div class="sk_bd">
                    <div class="layui-carousel" id="test1">
                        <div carousel-item>
                            <div class="item-box">
                                <div class="item">
                                    <a href="javascript:;"><img src="/api/Public/res/static/img/s_img2.jpg"></a>
                                    <div class="title">宝宝五彩袜棉质舒服</div>
                                    <div class="price">
                                        <span>￥49.00</span>
                                        <del>￥99.00</del>
                                    </div>
                                </div>
                                <div class="item">
                                    <a href="javascript:;"><img src="/api/Public/res/static/img/s_img3.jpg"></a>
                                    <div class="title">宝宝五彩袜棉质舒服</div>
                                    <div class="price">
                                        <span>￥49.00</span>
                                        <del>￥99.00</del>
                                    </div>
                                </div>
                                <div class="item">
                                    <a href="javascript:;"><img src="/api/Public/res/static/img/s_img4.jpg"></a>
                                    <div class="title">宝宝五彩袜棉质舒服</div>
                                    <div class="price">
                                        <span>￥49.00</span>
                                        <del>￥99.00</del>
                                    </div>
                                </div>
                                <div class="item">
                                    <a href="javascript:;"><img src="/api/Public/res/static/img/s_img5.jpg"></a>
                                    <div class="title">宝宝五彩袜棉质舒服</div>
                                    <div class="price">
                                        <span>￥49.00</span>
                                        <del>￥99.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="item-box">
                                <div class="item">
                                    <a href="javascript:;"><img src="/api/Public/res/static/img/s_img2.jpg"></a>
                                    <div class="title">宝宝五彩袜棉质舒服</div>
                                    <div class="price">
                                        <span>￥49.00</span>
                                        <del>￥99.00</del>
                                    </div>
                                </div>
                                <div class="item">
                                    <a href="javascript:;"><img src="/api/Public/res/static/img/s_img3.jpg"></a>
                                    <div class="title">宝宝五彩袜棉质舒服</div>
                                    <div class="price">
                                        <span>￥49.00</span>
                                        <del>￥99.00</del>
                                    </div>
                                </div>
                                <div class="item">
                                    <a href="javascript:;"><img src="/api/Public/res/static/img/s_img4.jpg"></a>
                                    <div class="title">宝宝五彩袜棉质舒服</div>
                                    <div class="price">
                                        <span>￥49.00</span>
                                        <del>￥99.00</del>
                                    </div>
                                </div>
                                <div class="item">
                                    <a href="javascript:;"><img src="/api/Public/res/static/img/s_img5.jpg"></a>
                                    <div class="title">宝宝五彩袜棉质舒服</div>
                                    <div class="price">
                                        <span>￥49.00</span>
                                        <del>￥99.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="product-cont w1200" id="product-cont">
        <div class="product-item product-item1 layui-clear">
            <div class="left-title">
                <h4><i>1F</i></h4>
                <img src="/api/Public/res/static/img/icon_gou.png">
                <h5>新品推荐</h5>
            </div>
            <div class="right-cont">
                <a href="<?php echo U('/buytoday');?>" class="top-img"><img src="/api/Public/<?php echo ($index_new_img); ?>" alt=""></a>
                <div class="img-box">
                    <?php if(is_array($g_new)): foreach($g_new as $key=>$vo): ?><a href="<?php echo U('/details',array(goods_id=>$vo['goods_id']));?>"><img src="/api/Public/<?php echo ($vo["goods_pic"]); ?>"></a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
        <div class="product-item product-item2 layui-clear">
            <div class="left-title">
                <h4><i>2F</i></h4>
                <img src="/api/Public/res/static/img/icon_gou.png">
                <h5>热销零食</h5>
            </div>
            <div class="right-cont">
                <a href="<?php echo U('/buytoday');?>" class="top-img"><img src="/api/Public/<?php echo ($index_rexiao_img); ?>" alt=""></a>
                <div class="img-box">
                    <?php if(is_array($g_rexiao)): foreach($g_rexiao as $key=>$vo): ?><a href="<?php echo U('/details',array(goods_id=>$vo['goods_id']));?>"><img src="/api/Public/<?php echo ($vo["goods_pic"]); ?>"></a><?php endforeach; endif; ?>
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
        base: '/api/Public/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
    }).use(['mm', 'carousel'], function () {
        var carousel = layui.carousel,
            mm = layui.mm;
        var option = {
            elem: '#test1'
            , width: '100%' //设置容器宽度
            , arrow: 'always'
            , height: '298'
            , indicator: 'none'
        }
        carousel.render(option);


    });
</script>
</body>
</html>