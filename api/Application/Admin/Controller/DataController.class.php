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
        //销售额数据统计
        $sales = M("sales");
        $catelog = M("catelog");
        $map['catelog_del'] = 'no';
        $cate = $catelog->where($map)->select();
        $lengend = array();
        foreach ($cate as $k => $v) {
            array_push($lengend,$v["catelog_name"]);
        }
        $data = $sales->select();
        $series = array();
        foreach ($cate as $k =>$v) {
            $series[$k] = array();
            for ($i=0; $i < 7; $i++) { 
                # code...
                $series[$k][$i] = 0;
            }
            foreach ($data as $k1 => $v1) {
                if($v["catelog_id"] == $v1["data_catelog_id"]) {
                    $series[$k][$v1["data_week"]] = $v1["data_total"];
                }
            }
        }
        $res["code"] = 0;
        $res["msg"] = "";
        $res["lengend"] = $lengend;
        $res["data"] = $series;
        echo $this->ajaxReturn($res,'json');
    }

    public function salesvolume()
    {
        //销售量数据统计
        $salesvolume = M("salesvolume");
        $catelog = M("catelog");
        $map['catelog_del'] = 'no';
        $cate = $catelog->where($map)->select();
        $lengend = array();
        foreach ($cate as $k => $v) {
            array_push($lengend,$v["catelog_name"]);
        }
        $data = $salesvolume->select();
        $series = array();
        foreach ($cate as $k =>$v) {
            $series[$k] = array();
            for ($i=0; $i < 7; $i++) { 
                # code...
                $series[$k][$i] = 0;
            }
            foreach ($data as $k1 => $v1) {
                if($v["catelog_id"] == $v1["data_catelog_id"]) {
                    $series[$k][$v1["data_week"]] = $v1["data_num"];
                }
            }
        }
        $res["code"] = 0;
        $res["msg"] = "";
        $res["lengend"] = $lengend;
        $res["data"] = $series;
        echo $this->ajaxReturn($res,'json');
    }
}