<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/7
 * Time: 15:33
 */

namespace Home\Controller;


use Think\Controller;
use Think\Page;

class LiuyanController extends Controller
{
    public function getall() {
        $liuyan = M("liuyan");
        $map["liuyan_isOk"] = "1";
        $cnt = count($liuyan->where($map)->select());

        $p = new  Page($cnt,10);
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $page = $p->show();

        $liuyan_list = $liuyan->where($map)->order('liuyan_id desc')->limit($p->firstRow,$p->listRows)->select();
        foreach ($liuyan_list as $k => $v) {
            $liuyan_list[$k]['liuyan_content'] = htmlspecialchars_decode($v["liuyan_content"]);
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
        $this->assign("liuyanlist",$liuyan_list);
        $this->display();
    }

    public function liuyanadd() {
        //获取用户信息
        $user = I("session.user");
        if($user) {
            $data['liuyan_title'] = I('post.liuyan_title');
            $data['liuyan_content'] = I('post.liuyan_content');
            $data['liuyan_date'] = date('Y-m-d H:i:s',time());
            $data['liuyan_user'] = $user['user_name'];
            $liuyan = M('liuyan');
            $result = $liuyan->data($data)->add();
            if($result) {
                $res["code"] = 0;
                $res["msg"] = "";
                $res["data"] = "";
            } else {
                $res["code"] = 102;
                $res["msg"] = "";
                $res["data"] = "";
            }
        } else {
            $res["code"] = 103;
            $res["msg"] = "";
            $res["data"] = "";
        }
        echo $this->ajaxReturn($res,"json");
    }
}