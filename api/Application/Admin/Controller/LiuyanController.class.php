<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:30
 */

namespace Admin\Controller;


use Think\Controller;

class LiuyanController extends Controller
{
    public function llist() {
        $liuyan = M("liuyan");

        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);

        $start = $limit * ($page - 1);

        $ccount = count($liuyan->select());
        $data = $liuyan->order('liuyan_id desc')->limit($start,$limit)->select();
        foreach ($data as $k => $v) {
            $data[$k]['liuyan_content'] = htmlspecialchars_decode($v['liuyan_content']);
        }

        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $ccount;
        $res["data"] = $data;
        echo json_encode($res);
    }

    public function lconfirm() {
        $map["liuyan_id"] = I("post.liuyan_id");
        $event = I("post.event");

        $liuyan = M("liuyan");
        if($event == 'pass') {
            $data["liuyan_isOk"] = 1;
        } else if($event == 'deny'){
            $data["liuyan_isOk"] = 2;
        }

        $result = $liuyan->where($map)->data($data)->save();
        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "删除失败";
            $res["data"] = "";
        }
        echo json_encode($res);
    }

    public function ldel() {
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
        echo json_encode($res);
    }
}