<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/11
 * Time: 10:40
 */

namespace Admin\Controller;


use Think\Controller;

class InformationController extends Controller
{

    /**
     * 资讯列表
     */
    public function ilist()
    {

        $information = M("information");
        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);


        $ccount = count($information->select());
        $data = $information->order('information_id desc')->limit($start, $limit)->select();

        foreach ($data as $key => $value) {
            $data[$key]['information_content'] = htmlspecialchars_decode($value['information_content']);
            $data[$key]['pic'] = '/api/public' . $value["information_pic"];
        }
        $list["msg"] = "";
        $list["code"] = 0;
        $list["count"] = $ccount;
        $list["data"] = $data;
        echo $this->ajaxReturn($list, 'json');
    }

    /**
     * 资讯添加
     */
    public function iadd()
    {
        $data["information_name"] = I("post.information_name");
        $data["information_content"] = I("post.information_content");
        $data["information_pic"] = I("post.i_picture");
        $data["information_date"] = date("Y-m-d H:i:s", time());

        $information = M("information");

        $result = $information->data($data)->add();

        if ($result) {

            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
            $gonggao = M('gonggao');
            $g_data["gonggao_title"] = "管理员发布咨讯";
            $g_data["gonggao_content"] = "管理员于".date("Y-m-d H:i:s",time())."发布零食咨讯《".$data["information_name"]."》，请大家注意查看~";
            $g_data["gonggao_date"] = date("Y-m-d H:i:s",time());
            $gonggao->data($g_data)->add();
        } else {
            $res["code"] = 102;
            $res["msg"] = "数据有误";
            $res["data"] = "";
        }
        $this->ajaxReturn($res, "json");
    }

    /**
     * 资讯发布
     */
    public function imodify()
    {
        $map["information_id"] = I("post.information_id");
        $data["information_isShow"] = "1";

        $information = M("information");
        $i_data = $information->where($map)->find();
        $result = $information->where($map)->save($data);

        if ($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
            $gonggao = M('gonggao');
            $g_data["gonggao_title"] = "管理员发布咨讯";
            $g_data["gonggao_content"] = "管理员于".date("Y-m-d H:i:s",time())."发布零食咨讯《".$i_data['information_name']."》，请大家注意查看~";
            $g_data["gonggao_date"] = date("Y-m-d H:i:s",time());
            $gonggao->data($g_data)->add();
        } else {
            $res["code"] = 102;
            $res["msg"] = "";
            $res["data"] = "";
        }
        $this->ajaxReturn($res, "json");
    }

    /**
     * 资讯收回
     */
    public function idel()
    {
        $map["information_id"] = I("post.information_id");
        $data["information_isShow"] = "0";

        $information = M("information");

        $result = $information->where($map)->save($data);

        if ($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "";
            $res["data"] = "";
        }
        $this->ajaxReturn($res, "json");
    }

}