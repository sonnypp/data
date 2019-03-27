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

class GonggaoController extends Controller
{
    public function index() {
        $gonggao = M("gonggao");
        $map["gonggao_del"] = "no";
        $cnt = count($gonggao->where($map)->select());

        $p = new  Page($cnt,12);
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $page = $p->show();

        $gongao_list = $gonggao->where($map)->limit($p->firstRow,$p->listRows)->select();


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
        $this->assign("gonggaolist",$gongao_list);
        $this->display();
    }

}