<?php
/**
 * Created by PhpStorm.
 * User: swp76
 * Date: 2019/4/16
 * Time: 12:18
 */

namespace Admin\Controller;

use Think\Controller;

class FilmController extends Controller
{
    public function flist()
    {
        $film = M('film');

        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);


//        echo $ccount;
        $ccount = count($film->select());
        $data = $film->order('p_id desc')->limit($start, $limit)->select();
        $list["msg"] = "";
        $list["code"] = 0;
        $list["count"] = $ccount;
        $list["data"] = $data;
        echo $this->ajaxReturn($list,'json');
    }

    public function fmodify()
    {
        $id = I('post.p_id');
        $film = M('film');
        $list = $film->select();
        foreach ($list as $k => $v) {
            $map["p_id"] = $v["p_id"];
            $data["p_is_first"] = 0;
            if($v["p_id"] == $id) {
                $data["p_is_first"] = 1;
                $gonggao = M('gonggao');
                $g_data["gonggao_title"] = "管理员宣传片修改";
                $g_data["gonggao_content"] = "管理员于".date("Y-m-d H:i:s",time())."更改宣传片《".$v["p_name"]."》，请大家注意查看~";
                $g_data["gonggao_date"] = date("Y-m-d H:i:s",time());
                $gonggao->data($g_data)->add();
            }
            $result = $film->where($map)->save($data);
        }
        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "";
            $res["data"] = "";
        }
        echo $this->ajaxReturn($res,'json');
    }

    public function fdele()
    {
        $id = I('post.p_id');
        $film = M('film');
        $map['p_id'] = $id;
        $f = $film->where($map)->find();
        if($f['p_is_first'] === 1) {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $result = $film->where($map)->delete();
            if($result) {
                $res["code"] = 0;
                $res["msg"] = "";
                $res["data"] = "";
            } else {
                $res["code"] = 102;
                $res["msg"] = "";
                $res["data"] = "";
            }
        }
        echo $this->ajaxReturn($res,'json');
    }

    public function fadd()
    {
        $data["p_name"] = I("post.p_name");
        $data["p_address"] = I("post.p_address");

        $film = M("film");
        $map['p_address'] = $data['p_address'];
        $cnt = $film->where($map)->find();
        if($cnt) {
            $res["code"] = 103;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $result = $film->data($data)->add();
            if ($result) {
                $res["code"] = 0;
                $res["msg"] = "";
                $res["data"] = "";
            } else {
                $res["code"] = 102;
                $res["msg"] = "数据有误";
                $res["data"] = "";
            }
        }

        $this->ajaxReturn($res, "json");
    }


}