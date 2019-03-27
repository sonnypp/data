<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/7
 * Time: 15:33
 */

namespace Home\Controller;


use Think\Controller;

class UserController extends Controller
{
    //用户信息
    public function info()
    {
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

        if(empty($user)|| $user == null) {
            $this->display("Index:login");

        } else {
            $this->display("myinfo");
        }
    }
    public function changepw()
    {
        //获取用户信息
        session_start();
        $user = I("session.user");
        $user_oldpw = I("post.user_oldpw");
        $user_newpw = I("post.user_newpw");
        if($user_oldpw != $user["user_pw"]) {
            $res["code"] = 103;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $data["user_pw"] = $user_newpw;
            $u_map["user_id"] = $user["user_id"];
            $umodel = M("user");
            $result = $umodel->where($u_map)->data($data)->save();
            if($result) {
                $res["code"] = 0;
                $res["msg"] = "";
                $res["data"] = "";
                session("user",null);
            } else {
                $res["code"] = 102;
                $res["msg"] = "";
                $res["data"] = "";
            }
        }
        echo $this->ajaxReturn($res,'json');
    }

    //订单
    public function order()
    {
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



        if(empty($user)|| $user == null) {
            $this->display("Index:login");

        } else {
            $this->display("myorder");
        }
    }

    public function olist()
    {
        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);

        $start = $limit * ($page - 1);

        $user = I("session.user");
        $o_map["order_user_id"] = $user["user_id"];
        $order = M("order");
        $ct = count($order->where($o_map)->select());
        $mlist = $order->where($o_map)->limit($start,$limit)->select();
        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $ct;
        $res["data"] = $mlist;
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

    //留言
    public function message()
    {
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

        if(empty($user)|| $user == null) {
            $this->display("Index:login");

        } else {
            $this->display("mymessage");
        }
    }

    public function mlist()
    {
        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);

        $start = $limit * ($page - 1);

        $user = I("session.user");
        $l_map["liuyan_user"] = $user["user_name"];
        $liuyan = M("liuyan");
        $ct = count($liuyan->where($l_map)->select());
        $mlist = $liuyan->where($l_map)->limit($start,$limit)->select();
            $res["code"] = 0;
            $res["msg"] = "";
            $res["count"] = $ct;
            $res["data"] = $mlist;

        echo $this->ajaxReturn($res,'json');
    }

    public function mdel()
    {
        $map["liuyan_id"] = I("post.liuyan_id");
        $liuyan = M("liuyan");
        $result = $liuyan->where($map)->delete();
        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "删除失败";
            $res["data"] = "";
        }
        echo $this->ajaxReturn($res,'json');
    }

}