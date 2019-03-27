<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/26
 * Time: 22:53
 */

namespace Admin\Controller;


use Think\Controller;

class DataController extends Controller
{
    public function sales()
    {
        $sales = M("sales");
        $catelog = M("catelog");
        $map['catelog_del'] = 'no';
        $cate = $catelog->where($map)->select();
        var_dump($cate);
        exit;
        $data = $sales->select();
        $res["code"] = 0;
        $res["msg"] = "";
        $res["data"] = $data;
        echo $this->ajaxReturn($res,'json');
    }

    public function salesvolume()
    {
        $sales = M("salesvolume");
        $data = $sales->select();
        $res["code"] = 0;
        $res["msg"] = "";
        $res["data"] = $data;
        echo $this->ajaxReturn($res,'json');
    }
}