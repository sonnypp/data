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

        $liuyan_list = $liuyan->where($map)->limit($p->firstRow,$p->listRows)->select();

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

        $this->assign("page",$page);
        $this->assign("liuyanlist",$liuyan_list);
        $this->display();
    }

    public function liuyanadd() {

    }
}