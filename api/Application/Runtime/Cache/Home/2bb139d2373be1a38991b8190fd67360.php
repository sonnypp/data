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
            <?php if($num == 0): ?><div class="login"><a href="<?php echo U('/login');?>">登录</a></div>
                <div class="sp-cart"><a href="<?php echo U('/shopcart');?>">购物车</a><span><?php if($num == 0): ?>0 <else > <?php echo ($num); ?></else><?php endif; ?></span></div>
                <?php else: endif; ?>

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

  <div class="content content-nav-base buytoday-content">
    <div id="list-cont">
      <div class="main-nav">
        <div class="inner-cont0">
          <div class="inner-cont1 w1200">
            <div class="inner-cont2">
              <a href="<?php echo U('/commodity');?>">所有零食</a>
              <a href="<?php echo U('/buytoday');?>" class="active">零食推荐</a>
              <a href="<?php echo U('/information');?>">零食资讯</a>
              <a href="<?php echo U('/about');?>">关于我们</a>
            </div>
          </div>
        </div>
      </div>
      <div class="banner-box">
        <div class="banner"></div>
      </div>
      <div class="product-list-box">
        <div class="product-list w1200">  
          <div class="tab-title">
            <a href="javascript:;" class="active tuang" data-content="newtuijian">新品推荐</a>
            <a href="javascript:;" data-content="rexiaotuijian">热销推荐</a>
          </div>
          <div class="list-cont" cont = 'newtuijian'>
            <div class="item-box layui-clear">

              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img1.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img2.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img3.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img4.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img1.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img2.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img3.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img4.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="list-cont layui-hide" cont = 'rexiaotuijian'>
            <div class="item-box layui-clear">
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img4.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img3.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img2.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img1.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img4.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img3.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img2.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
              </div>
              <div class="item">
                <img src="/api/Public/res/static/img/tuan_img1.jpg" alt="">
                <div class="text-box">
                  <p class="title">宝宝专用硅胶环保饭碗四套+调羹+筷子自助学吃饭套装</p>
                  <p class="plic">
                    <span class="ciur-pic">￥100.00</span>
                    <span class="Ori-pic">￥208.00</span>
                    <span class="discount">5折</span>
                  </p>
                </div>
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
<script>

  layui.config({
    base: '/api/Public/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','laypage','jquery'],function(){
      var laypage = layui.laypage,$ = layui.$;
     mm = layui.mm;


      $('body').on('click','*[data-content]',function(){
        $(this).addClass('active').siblings().removeClass('active')
        var dataConte = $(this).attr('data-content');
        $('*[cont]').each(function(i,item){
          var itemCont = $(item).attr('cont');
          if(dataConte === itemCont){
            $(item).removeClass('layui-hide');
          }else{
            $(item).addClass('layui-hide');
          }
        })
      })

});
</script>


</body>
</html>