<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/7
 * Time: 15:35
 */

namespace Home\Controller;


use Think\Controller;
use Think\Page;

class InformationController extends Controller
{
    public function inforlist() {
        $information = M("information");
        $map["information_isShow"] = "1";
        $result = $information->where($map)->select();


        $cnt = count($result);

        $p = new Page($cnt,10);
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $p->lastSuffix = false;//最后一页不显示为总页数
        $page = $p->show();

        $infor_list = $information->where($map)->limit($p->firstRow.','.$p->listRows)->select();


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
        $this->assign("information",$infor_list);
        $this->assign("page",$page);
        $this->display("list");
    }
}