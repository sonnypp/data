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


<div class="content content-nav-base information-content">
    <div class="main-nav">
        <div class="inner-cont0">
            <div class="inner-cont1 w1200">
                <div class="inner-cont2">
                    <a href=<?php echo U('/commodity');?>>所有零食</a>
                    <a href=<?php echo U('/buytoday');?>>零食推荐</a>
                    <a href=<?php echo U('/information');?>  class="active">零食资讯</a>
                    <a href="<?php echo U('/gonggao');?>">零食公告</a>
                    <a href="<?php echo U('/liuyan');?>">留言板</a>
                    <a href=<?php echo U('/about');?>>关于我们</a>
                </div>
            </div>
        </div>
    </div>
    <div class="info-list-box">
        <div class="info-list w1200">
            <div class="item-box layui-clear" id="list-cont">

                <?php if(is_array($information)): foreach($information as $key=>$vo): ?><div class="item">
                        <div class="img">
                            <img src="/api/Public/<?php echo ($vo["information_pic"]); ?>" alt="">
                        </div>
                        <div class="text">
                            <h4><?php echo ($vo["information_name"]); ?></h4>
                            <p class="data"><?php echo ($vo["information_date"]); ?></p>
                            <p class="info-cont"><?php echo ($vo["information_content"]); ?></p>
                        </div>
                    </div><?php endforeach; endif; ?>

                <!--<div class="item">-->
                    <!--<div class="img">-->
                        <!--<img src="/api/Public/res/static/img/new1.jpg" alt="">-->
                    <!--</div>-->
                    <!--<div class="text">-->
                        <!--<h4>周岁内的宝宝消化不良拉肚子怎么办?</h4>-->
                        <!--<p class="data">2016-12-24 16:33:26</p>-->
                        <!--<p class="info-cont">宝宝在周岁之前体质相对较弱，特别是薄弱肠道，一不注意就会拉肚子;那么宝宝消化不良拉肚子</p>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="item">-->
                    <!--<div class="img">-->
                        <!--<img src="/api/Public/res/static/img/new2.jpg" alt="">-->
                    <!--</div>-->
                    <!--<div class="text">-->
                        <!--<h4>周岁内的宝宝消化不良拉肚子怎么办?</h4>-->
                        <!--<p class="data">2016-12-24 16:33:26</p>-->
                        <!--<p class="info-cont">宝宝在周岁之前体质相对较弱，特别是薄弱肠道，一不注意就会拉肚子;那么宝宝消化不良拉肚子</p>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="item">-->
                    <!--<div class="img">-->
                        <!--<img src="/api/Public/res/static/img/new1.jpg" alt="">-->
                    <!--</div>-->
                    <!--<div class="text">-->
                        <!--<h4>周岁内的宝宝消化不良拉肚子怎么办?</h4>-->
                        <!--<p class="data">2016-12-24 16:33:26</p>-->
                        <!--<p class="info-cont">宝宝在周岁之前体质相对较弱，特别是薄弱肠道，一不注意就会拉肚子;那么宝宝消化不良拉肚子</p>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="item">-->
                    <!--<div class="img">-->
                        <!--<img src="/api/Public/res/static/img/new2.jpg" alt="">-->
                    <!--</div>-->
                    <!--<div class="text">-->
                        <!--<h4>周岁内的宝宝消化不良拉肚子怎么办?</h4>-->
                        <!--<p class="data">2016-12-24 16:33:26</p>-->
                        <!--<p class="info-cont">宝宝在周岁之前体质相对较弱，特别是薄弱肠道，一不注意就会拉肚子;那么宝宝消化不良拉肚子</p>-->
                    <!--</div>-->
                <!--</div>-->
            </div>
            <div class="pages"><?php echo ($page); ?></div>
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
<!-- 模版引擎导入 -->
<!-- <script type="text/html" id="demo">
  {{# layui.each(d.listCont,function(index,item){}}
  <div class="item">
    <div class="img">
      <img src="/api/Public/res/img/new1.jpg" alt="">
    </div>
    <div class="text">
      <h4>周岁内的宝宝消化不良拉肚子怎么办?</h4>
      <p class="data">2016-12-24 16:33:26</p>
      <p class="info-cont">宝宝在周岁之前体质相对较弱，特别是薄弱肠道，一不注意就会拉肚子;那么宝宝消化不良拉肚子</p>
    </div>
  </div>
  {{# })}}
</script> -->
<script>
    layui.config({
        base: '/api/Public/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
    }).use(['mm','laypage'],function(){
        var
            mm = layui.mm,laypage = layui.laypage;
        laypage.render({
            elem: 'demo0'
            ,count: 100 //数据总数
        });
        // 模版引擎导入
        // var html = demo.innerHTML;
        // var listCont = document.getElementById('list-cont');
        //  mm.request({
        //    url: '/api/Public/json/information.json',
        //    success : function(res){
        //      console.log(res)
        //      listCont.innerHTML = mm.renderHtml(html,res)
        //    },
        //    error: function(res){
        //      console.log(res);
        //    }
        //  })
    });

</script>


</body>
</html>