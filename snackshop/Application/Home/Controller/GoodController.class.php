<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/7
 * Time: 15:32
 */

namespace Home\Controller;


use Think\Controller;
use Think\Page;


class GoodController extends Controller
{
    /**
     * 所有零食列表
     */
    public function getAll() {
        $catelog = M("catelog");
        $goods = M("goods");
        $order_item = M("orderitem");

        $map["catelog_del"] = "no";
        $result = $catelog->where($map)->select();


        $map1["goods_Del"] = "no";
        $foods = $goods->where($map1)->select();
        $cnt = count($foods);

        $p = new Page($cnt,12);
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $p->lastSuffix = false;//最后一页不显示为总页数
        $page = $p->show();
        $food = $goods->where($map1)->limit($p->firstRow.','.$p->listRows)->select();

        //计算销售量
        foreach ($food as $key => $item) {
            $i_map["goods_id"] = $item[goods_id];
//            var_dump($i_map);
//            exit;
            $i_list = $order_item->where($i_map)->select();

            $cnt = 0;
            foreach ($i_list as $k => $v) {
                $cnt+=$v[goods_quantity];
            }
            $food[$key]["xiaoshouliang"] = $cnt;
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
        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();

        $this->assign("logo_img",$logo_pic["logo_pic"]);

        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->assign("goods",$food);
        $this->assign("page",$page);
        $this->assign("list",$result);
        $this->display();
    }


    /**
     *根据零食类别查询零食
     */
    public function getByCatelog() {
        $catelog_id = I("get.catelog_id");
        $goods = M("goods");
        $catelog = M("catelog");
        $order_item = M("orderitem");

        $map["catelog_del"] = "no";
        $result = $catelog->where($map)->select();

        $g_map["goods_catelog_id"] = $catelog_id;
        $g_map["goods_Del"] = "no";
        $c_map["catelog_id"] = $catelog_id;

        $g_res = $goods->where($g_map)->select();
        $c_res = $catelog->where($c_map)->find();

        $cnt = count($g_res);

        $p = new Page($cnt,12);
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $page = $p->show();
        $gg_res = $goods->where($g_map)->limit($p->firstRow.','.$p->listRows)->select();

        //计算销售量
        foreach ($gg_res as $key => $item) {
            $i_map["goods_id"] = $item[goods_id];
//            var_dump($i_map);
//            exit;
            $i_list = $order_item->where($i_map)->select();

            $cnt = 0;
            foreach ($i_list as $k => $v) {
                $cnt+=$v[goods_quantity];
            }
            $gg_res[$key]["xiaoshouliang"] = $cnt;
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

        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();

        $this->assign("logo_img",$logo_pic["logo_pic"]);
        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->assign("page",$page);
        $this->assign("goods",$gg_res);
        $this->assign("list",$result);
        $this->assign("c_res",$c_res);
        $this->display();
    }

    /**
     * 商品详情页
     */
    public function detail() {
        $goods_id = I("get.goods_id");
        $goods = M("goods");
        $map["goods_id"] = $goods_id;
        $fd = $goods->where($map)->find();
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


        //相关零食推荐
        $r_map["goods_catelog_id"] = $fd["goods_catelog_id"];
        $r_map["goods_Del"] = 'no';
        $recommd_goods = $goods->where($r_map)->order('goods_id desc')->limit(4)->select();

        $this->assign("recommd_goods",$recommd_goods);
        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->assign("goods",$fd);
        $this->display();
    }

    //零食推荐
    public function buytoday() {
        $order_item = M("orderitem");
        $goods = M("goods");
        $banner = M("fourbanner");

        //图片
        $b_map["four_banner_isInstead"] = "yes";
        $b_img = $banner->where($b_map)->find();
//        var_dump($b_img);
//        exit;

        $g_map["goods_Del"] = "no";
        $g_new = $goods->where($g_map)->order("goods_date asc")->limit(8)->select();  //新品推荐

//        var_dump($g_new);
//        exit;

        $g_all =  $goods->where($g_map)->select();   //热销推荐
        //计算销售量
        foreach ($g_all as $key => $item) {
            $i_map["goods_id"] = $item[goods_id];
//            var_dump($i_map);
//            exit;
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
            if($cnt == 8) break;
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
        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img",$logo_pic["logo_pic"]);
        $this->assign("t_banner",$b_img["four_banner_pic"]);  //banner图片
        $this->assign("user",$user);
        $this->assign("num",$num);
        $this->assign("g_rexiao",$g_rexiao);
        $this->assign("g_new",$g_new);

        $this->display();
    }
}