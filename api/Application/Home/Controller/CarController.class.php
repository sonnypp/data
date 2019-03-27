<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/10
 * Time: 13:51
 */

namespace Home\Controller;


use Think\Controller;

class CarController extends Controller
{

    public function addTocar() {
        session_start();
        $goods = M("goods");
        $shop_car = I("session.shop_cart");
        $goods_id = I("post.goods_id");
        $quantity = I("post.quantity");
//        var_dump($shop_car);exit;
        $g_map["goods_id"] = $goods_id;
        $data = $goods->where($g_map)->find();
        $data["goods_shichangjia"] = number_format(intval($data["goods_shichangjia"]),2,'.','');
        $data["quantity"] = intval($quantity);
        $data["sum"] = number_format(intval($data["quantity"] *  $data["goods_shichangjia"]),2,'.','');

        if(!$shop_car) {   //加入购物车不存在，则新建购物车
            session('shop_cart',array());
            $shop_car = I("session.shop_cart");
            $shop_car.array_push($shop_car,$data);

        } else {   //加入购物车存在
            $is_exit = false;  //作为判断是否已存在该商品
            foreach ($shop_car as $k => $item) {

                if($item["goods_id"] == intval($goods_id)) {
                    $shop_car[$k]["quantity"] = intval($item["quantity"]) + intval($quantity);
                    $shop_car[$k]["sum"] = number_format(intval($shop_car[$k]["quantity"]) * intval($item["goods_shichangjia"]),2,'.','');
                    $is_exit = true;
                    break;
                }

            }

            if(!$is_exit) {
                $shop_car.array_push($shop_car,$data);
            }
        }


        session("shop_cart",$shop_car);

        $res["code"] = 0;
        $res["msg"] = "";
        $res["data"] = "";
        echo $this->ajaxReturn($res,'json');
    }


    //数量加一
    public function plus() {
        session_start();
        $shop_car = I("session.shop_cart");
        $goods_id = I("post.goods_id");
        foreach ($shop_car as $k => $item) {

            if($item["goods_id"] == intval($goods_id)) {
                $shop_car[$k]["quantity"] = intval($shop_car[$k]["quantity"]) + 1;
                $shop_car[$k]["sum"] = number_format(intval($shop_car[$k]["quantity"]) * intval($item["goods_shichangjia"]),2,'.','');
                break;
            }
        }

        session("shop_cart",$shop_car);

        $res["code"] = 0;
        $res["msg"] = "";
        $res["data"] = "";
        echo $this->ajaxReturn($res,'json');
    }


    //数量减1
    public function minus(){
        session_start();
        $shop_car = I("session.shop_cart");

        $goods_id = I("post.goods_id");
//        var_dump($goods_id);
//        exit;
        foreach ($shop_car as $k => $item) {

            if($item["goods_id"] == intval($goods_id)) {
                $shop_car[$k]["quantity"]  = intval($shop_car[$k]["quantity"])- 1;
                $shop_car[$k]["sum"] = number_format(intval($shop_car[$k]["quantity"]) * intval($item["goods_shichangjia"]),2,'.','');
                break;
            }
        }

        session("shop_cart",$shop_car);

        $res["code"] = 0;
        $res["msg"] = "";
        $res["data"] = "";
        echo $this->ajaxReturn($res,'json');
    }

    //删除购物车里其中一个商品
    public function del() {
        session_start();
        $shop_car = I("session.shop_cart");
        $goods_id = I("post.goods_id");
        foreach ($shop_car as $k => $item) {

            if($item["goods_id"] == intval($goods_id)) {
                unset($shop_car[$k]);
                break;
            }
        }

//        var_dump($shop_car);
//        exit;
        session("shop_cart",$shop_car);

        $res["code"] = 0;
        $res["msg"] = "";
        $res["data"] = "";
        echo $this->ajaxReturn($res,'json');
    }

    public function clear() {
        session_start();
        session("shop_cart",array());
        $res["code"] = 0;
        $res["msg"] = "";
        $res["data"] = "";
        echo $this->ajaxReturn($res,'json');
    }

}