<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:30
 */

namespace Admin\Controller;


use Think\Controller;

class OrderController extends Controller
{

    public function olist() {
        $order = M('order');

        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);

        $start = $limit * ($page - 1);
//        echo $ccount;
        $ccount = count($order->select());
        $data = $order->order('order_id desc')->limit($start,$limit) ->select();

        $list["msg"] = "";
        $list["code"] = 0;
        $list["count"] = $ccount;
        $list["data"] = $data;
        echo json_encode($list);
    }

    public function omodify() {
        $order = M('order');

        $map["order_id"] = I("post.order_id");
        $data["order_zhuangtai"] = "yes";
        $result = $order->where($map)->save($data);

        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "受理失败";
            $res["data"] = "";
        }
        echo json_encode($res);
    }

    public function odetail()
    {
        $order_id = I("get.order_id");
//        var_dump($order_id);exit;
        $goods = M("goods");
        $orderitem = M("orderitem");
        $o_map["order_id"] = $order_id;
        $order_item = $orderitem->where($o_map)->select();
        if($order_item) {
            $data = array();
            foreach ($order_item as $key => $value) {
                $temp = array();
                $temp["num"] = $key+1;
                $g_map["goods_id"] = $value["goods_id"];
                $t_good = $goods -> where($g_map) -> find();
                $temp["goods_name"] = $t_good["goods_name"];
                $temp["goods_shichangjia"] = $t_good["goods_shichangjia"];
                $temp["goods_volume"] = $value["goods_quantity"];
                array_push($data,$temp);
            }
            $res["code"] = 0;
            $res["data"] = $data;
            $res["msg"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "";
            $res["data"] = "";
        }
        echo $this->ajaxReturn($res,'json');
    }

    public function odel()
    {
        $order = M('order');
        $map["order_id"] = I("post.order_id");
        $result = $order->where($map)->delete();
        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "受理失败";
            $res["data"] = "";
        }
        echo $this->ajaxReturn($res,'json');
    }
}