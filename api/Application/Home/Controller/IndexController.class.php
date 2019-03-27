<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class IndexController extends Controller {
    public function index(){
        $catelog = M("catelog");
        $order_item = M("orderitem");
        $goods = M("goods");

        $map["catelog_del"] = "no";
        $cate = $catelog->where($map)->select();  //商品类别

        $g_map["goods_Del"] = "no";
        $g_new = $goods->where($g_map)->order("goods_date asc")->field(array('goods_id','goods_pic'))->limit(5)->select();  //新品推荐

        $g_all =  $goods->where($g_map)->field(array('goods_id','goods_pic'))->select();   //热销推荐
        //计算销售量
        foreach ($g_all as $key => $item) {
            $i_map["goods_id"] = $item[goods_id];

            $i_list = $order_item->where($i_map)->select();

            $cnt = 0;
            foreach ($i_list as $k => $v) {
                $cnt+=$v[goods_quantity];
            }
            $g_all[$key]["xiaoshouliang"] = $cnt;
        }

        usort($g_all,'cmp');

        $cnt = 0;
        foreach ($g_all as $k => $v) {
            $g_rexiao[$k] = $g_all[$k];
            $cnt++;
            if($cnt == 5) break;
        }

        //购物车
        $shop_car = I("session.shop_cart");
        if(!$shop_car) {
            $num = 0;
        } else {
            $num = count($shop_car);
        }

        //获取用户信息
        $user = I("session.user");


        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->assign("g_rexiao",$g_rexiao);
        $this->assign("g_new",$g_new);
        $this->assign("catelog",$cate);
        $this->display();
    }


    public function buytoday() {
        //购物车
        $shop_car = I("session.shop_cart");
        if(!$shop_car) {
            $num = 0;
        } else {
            $num = count($shop_car);
        }

        //获取用户信息
        $user = I("session.user");


        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->display();
    }


    public function shopcart() {
        $shop_car = I("session.shop_cart");
        //购物车
        $shop_car = I("session.shop_cart");
        if(!$shop_car) {
            $num = 0;
        } else {
            $num = count($shop_car);
        }

        //获取用户信息
        $user = I("session.user");


        $this->assign("user",$user);
        $this->assign("num",$num);
//        var_dump($shop_car);
//        exit;
        $this->assign("shopcart",$shop_car);
        $this->display();
    }

    public function login() {
        //购物车
        $shop_car = I("session.shop_cart");
        if(!$shop_car) {
            $num = 0;
        } else {
            $num = count($shop_car);
        }

        //获取用户信息
        $user = I("session.user");


        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->display();
    }
    public function about() {
        //购物车
        $shop_car = I("session.shop_cart");
        if(!$shop_car) {
            $num = 0;
        } else {
            $num = count($shop_car);
        }

        //获取用户信息
        $user = I("session.user");


        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->display();
    }

}