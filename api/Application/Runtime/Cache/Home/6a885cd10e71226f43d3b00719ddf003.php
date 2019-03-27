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

                    <div class="sp-cart"><a href="<?php echo U('/shopcart');?>">购物车</a><span><?php if($num == 0): ?>0 <else > <?php echo ($num); ?></else><?php endif; ?></span></div><?php endif; ?>

        </div>
    </div>
</div>



<div class="header">
    <div class="headerLayout w1200">
        <div class="headerCon">
            <h1 class="mallLogo">
                <a href="#" title="零食商城">
                    <img src="/api/Public/res/static/img/logo2.jpg">
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
            <a href="javascript:;">首页</a>
            <span>></span>
            <a href="javascript:;">所有商品</a>
            <span>></span>
            <a href="javascript:;">产品详情</a>
        </div>
        <form action="" lay-filter="goods" class="layui-form">
            <div class="layui-form-item">
                <input type="hidden" name="goods_id" value="<?php echo ($goods["goods_id"]); ?>" class="layui-input">
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="quantity" value="1" id="quantity" class="layui-input">
            </div>

            <div class="product-intro layui-clear">
                <div class="preview-wrap">
                    <a href="javascript:;"><img src="/api/Public/<?php echo ($goods["goods_pic"]); ?>"  width="400px" height="400px" style="margin: 3px; border: black 2px"></a>
                </div>
                <div class="itemInfo-wrap">
                    <div class="itemInfo">
                        <div class="title">
                            <h4><?php echo ($goods["goods_name"]); ?> </h4>
                            <span><i class="layui-icon layui-icon-rate-solid"></i>收藏</span>
                        </div>
                        <div class="summary" style="height: auto">
                            <p class="activity"><span>市场价</span><strong class="price"> ￥<?php echo ($goods["goods_shichangjia"]); ?></strong></p>
                            <p class="activity"><span>产品描述</span><?php echo ($goods["goods_miaoshu"]); ?></p>
                        </div>
                        <div class="choose-attrs">
                            <div class="number layui-clear"><span class="title">数&nbsp;&nbsp;&nbsp;&nbsp;量</span><div class="number-cont"><span class="cut btn">-</span><input onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" maxlength="4" type="" name="" value="1"><span class="add btn">+</span></div></div>
                        </div>
                        <div class="choose-btns">
                            <button class="layui-btn layui-btn-primary purchase-btn" lay-submit lay-filter="buy">立刻购买</button>
                            <button class="layui-btn  layui-btn-danger car-btn" lay-submit lay-filter="add"><i class="layui-icon layui-icon-cart-simple"></i>加入购物车</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<script type="text/javascript">
    layui.config({
        base: '/api/Public/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
    }).use(['mm','jquery','form','layer'],function(){
        var mm = layui.mm,$ = layui.$,form = layui.form,layer = layui.layer;
        var cur = $('.number-cont input').val();
        $('.number-cont .btn').on('click',function(){
            if($(this).hasClass('add')){
                cur++;
            }else{
                if(cur > 1){
                    cur--;
                }
            }
            $('.number-cont input').val(cur)
            $('#quantity').val(cur);
        })
        form.render(null,'goods');
        form.on('submit(buy)',function(data){
            // console.log(data.field);
            $.post("/api/index.php/addcart",data.field,function (res) {
                if(res.code == 0) {
                    window.location.href="<?php echo U('/shopcart');?>";
                } else {
                    layer.msg("添加购物车失败");
                }
            })
            return false;
        })

        form.on('submit(add)',function(data){
            $.post("/api/index.php/addcart",data.field,function (res) {
                if(res.code == 0) {
                    layer.msg("添加购物车成功，请继续购买");
                } else {
                    layer.msg("添加购物车失败");
                }
            })
            return false;
        })
    });
</script>


</body>
</html>