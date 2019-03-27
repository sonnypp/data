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
      <div class="cart-table-th">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
              <input class="check-all check" id="allCheckked" type="checkbox" value="true">
            </div>
          <label>&nbsp;&nbsp;全选</label>
          </div>
        </div>
        <div class="th th-item">
          <div class="th-inner">
            商品
          </div>
        </div>
        <div class="th th-price">
          <div class="th-inner">
            单价
          </div>
        </div>
        <div class="th th-amount">
          <div class="th-inner">
            数量
          </div>
        </div>
        <div class="th th-sum">
          <div class="th-inner">
            小计
          </div>
        </div>
        <div class="th th-op">
          <div class="th-inner">
            操作
          </div>
        </div>  
      </div>
      <div class="OrderList">
        <div class="order-content" id="list-cont">
          <?php if(!$shopcart): endif; ?>
          <else >
            <?php if(is_array($shopcart)): foreach($shopcart as $key=>$vo): ?><ul class="item-content layui-clear">
                <li class="th th-chk">
                  <div class="select-all">
                    <div class="cart-checkbox">
                      <input class="CheckBoxShop check" id="" type="checkbox" num="all" name="select-all" value="true">
                    </div>
                  </div>
                </li>
                <li class="th th-item">
                  <div class="item-cont">
                    <a href="<?php echo U('/details',array(goods_id=>$vo['goods_id']));?>"><img src="/api/Public/<?php echo ($vo["goods_pic"]); ?>" alt=""></a>
                    <div class="text">
                      <div class="title"><?php echo ($vo["goods_name"]); ?></div>
                      <input class="goods_id" type="hidden" name="gooods_id" value="<?php echo ($vo["goods_id"]); ?>">
                    </div>
                  </div>
                </li>
                <li class="th th-price">
                  <span class="th-su"><?php echo ($vo["goods_shichangjia"]); ?></span>
                </li>
                <li class="th th-amount">
                  <div class="box-btn layui-clear">
                    <div class="less layui-btn">-</div>
                    <input class="Quantity-input" type="" name="" value="<?php echo ($vo["quantity"]); ?>" disabled="disabled">
                    <div class="add layui-btn">+</div>
                  </div>
                </li>
                <li class="th th-sum">
                  <span class="sum"><?php echo ($vo["sum"]); ?></span>
                </li>
                <li class="th th-op">
                  <span class="dele-btn">删除</span>
                </li>
              </ul><?php endforeach; endif; ?>
          </else>
        </div>
      </div>




      <div class="FloatBarHolder layui-clear">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
              <input class="check-all check" id="" name="select-all" type="checkbox"  value="true">
            </div>
            <label>&nbsp;&nbsp;已选<span class="Selected-pieces">0</span>件</label>
          </div>
        </div>
        <div class="th batch-deletion">
          <span class="batch-dele-btn">批量删除</span>
        </div>
        <div class="th Settlement">
          <button class="layui-btn" lay-submit="" lay-filter="commsue">结算</button>
        </div>
        <div class="th total">
          <p>应付：<span class="pieces-total">0</span></p>
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
  }).use(['mm','jquery','element','car','form'],function(){
    var mm = layui.mm,$ = layui.$,element = layui.element,car = layui.car,form = layui.form;

    form.on('submit(commsue)',function(data){
        $.get("/api/index.php/clear",function () {
            console.log(1111);
        })
    })

    car.init()


});
</script>
</body>
</html>