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
        $data = $order->limit($start,$limit) ->select();

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
}