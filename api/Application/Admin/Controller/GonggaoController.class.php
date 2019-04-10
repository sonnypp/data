<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:29
 */

namespace Admin\Controller;


use Think\Controller;

class GonggaoController extends Controller
{
    public function glist() {
        $gonggao = M("gonggao");
        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);

        $start = $limit * ($page - 1);

        $map['gonggao_del'] = "no";
        $ccount = count($gonggao->where($map)->select());

        $data = $gonggao->where($map)->order('gonggao_id desc')->limit($start,$limit) ->select();

        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $ccount;
        $res["data"] = $data;
        echo json_encode($res);
    }

    public function gadd() {
        $data["gonggao_title"] = I("post.gonggao_title");
        $data["gonggao_content"] = I("post.gonggao_content");
        $data["gonggao_date"] = date("Y-m-d h:i:s",time());
        $gonggao = M("gonggao");
        $result = $gonggao->data($data)->add();
        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "数据有误";
            $res["data"] = "";
        }
        echo json_encode($res);
    }

    public function gdel() {
        $map["gonggao_id"] = I("post.gonggao_id");
        $data["gonggao_del"] = "yes";

        $gonggao = M("gonggao");

        $result = $gonggao->where($map)->save($data);

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