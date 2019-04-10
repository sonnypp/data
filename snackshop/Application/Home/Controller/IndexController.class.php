<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class IndexController extends Controller {
    public function index(){
        $catelog = M("catelog");
        $order_item = M("orderitem");
        $goods = M("goods");
        $banner1 = M("onebanner");
        $banner2 = M("twobanner");
        $banner3 = M("threebanner");
        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img",$logo_pic["logo_pic"]);
        $b1_map["one_banner_isInstead"] = "yes";
        $b2_map["two_banner_isInstead"] = "yes";
        $b3_map["three_banner_isInstead"] = "yes";


        $b1_img = $banner1->where($b1_map)->find();
        $b2_img = $banner2->where($b2_map)->find();
        $b3_img = $banner3->where($b3_map)->find();


        $map["catelog_del"] = "no";
        $cate = $catelog->where($map)->select();  //商品类别

        $g_map["goods_Del"] = "no";
        $g_new = $goods->where($g_map)->order("goods_id desc")->field(array('goods_id','goods_pic','goods_name','goods_shichangjia'))->limit(5)->select();  //新品推荐

        $g_all =  $goods->where($g_map)->field(array('goods_id','goods_pic','goods_name','goods_shichangjia'))->select();   //热销推荐
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

        $this->assign("new_view",array_slice($g_new,0,4));
        $this->assign('rexiao_view',array_slice($g_rexiao,0,4));
        $this->assign("index_img",$b1_img["one_banner_pic"]);
        $this->assign("index_new_img",$b2_img["two_banner_pic"]);
        $this->assign("index_rexiao_img",$b3_img["three_banner_pic"]);
        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->assign("g_rexiao",$g_rexiao);
        $this->assign("g_new",$g_new);
        $this->assign("catelog",$cate);
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

        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img",$logo_pic["logo_pic"]);
        $this->assign("user",$user);
        $this->assign("num",$num);
        if(!empty($user) || $user!=null ) {
            $catelog = M("catelog");
            $order_item = M("orderitem");
            $goods = M("goods");
            $banner1 = M("onebanner");
            $banner2 = M("twobanner");
            $banner3 = M("threebanner");

            $b1_map["one_banner_isInstead"] = "yes";
            $b2_map["two_banner_isInstead"] = "yes";
            $b3_map["three_banner_isInstead"] = "yes";

            $b1_img = $banner1->where($b1_map)->find();
            $b2_img = $banner2->where($b2_map)->find();
            $b3_img = $banner3->where($b3_map)->find();


            $map["catelog_del"] = "no";
            $cate = $catelog->where($map)->select();  //商品类别

            $g_map["goods_Del"] = "no";
            $g_new = $goods->where($g_map)->order("goods_id asc")->field(array('goods_id','goods_pic','goods_name','goods_shichangjia'))->limit(5)->select();  //新品推荐

            $g_all =  $goods->where($g_map)->field(array('goods_id','goods_pic','goods_name','goods_shichangjia'))->select();   //热销推荐
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
            $this->assign("new_view",array_slice($g_new,0,4));
            $this->assign('rexiao_view',array_slice($g_rexiao,0,4));
            $this->assign("index_img",$b1_img["one_banner_pic"]);
            $this->assign("index_new_img",$b2_img["two_banner_pic"]);
            $this->assign("index_rexiao_img",$b3_img["three_banner_pic"]);
            $this->assign("g_rexiao",$g_rexiao);
            $this->assign("g_new",$g_new);
            $this->assign("catelog",$cate);
            $this->display("index");

        } else {
            $this->display();
        }
    }
    public function logout()
    {
        session_start();
        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img",$logo_pic["logo_pic"]);
        session("shop_cart",array());
        session("user",null);
        $this->display("login");
    }

    public function dealed()
    {
        $user_name = I("post.user_name");
        $user_pw = I("post.user_pw");
        $u_map["user_name"] = $user_name;
        $u_map["user_pw"] = $user_pw;
        $user = M("user");
        $result = $user->where($u_map)->find();
        if($result) {
            $res['code'] = 0;
            $res['msg'] = "";
            $res['data'] = "";
            session_start();
            session("user",$result);
        } else {
            $res['code'] = 102;
            $res['msg'] = "";
            $res['data'] = "";
        }
        echo $this->ajaxReturn($res,'json');
    }

    public function register() {
        //购物车
        $shop_car = I("session.shop_cart");
        if(!$shop_car) {
            $num = 0;
        } else {
            $num = count($shop_car);
        }

        //获取用户信息
        $user = I("session.user");

        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img",$logo_pic["logo_pic"]);

        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->display();
    }

    //购物车
    public function shopcart() {
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
        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img",$logo_pic["logo_pic"]);
        $this->assign("shopcart",$shop_car);
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


        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img",$logo_pic["logo_pic"]);
        $this->assign("user",$user);
        $this->assign("num",$num);


        $film = M('film');
        $f_map['p_is_first'] = 1;
        $fone = $film->where($f_map)->find();
        $this->assign('film',$fone);
        $this->display();
    }

}