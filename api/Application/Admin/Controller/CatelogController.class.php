<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:26
 */

namespace Admin\Controller;

use Think\Controller;

class CatelogController extends Controller
{
    public function clist()
    {
        $cate = M('catelog');
        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);
//        echo $ccount;
        $map['catelog_del'] = 'no';
        $ccount = count($cate->where($map)->select());
        $data = $cate->limit($start, $limit)->where($map)->select();
        $list["msg"] = "";
        $list["code"] = 0;
        $list["count"] = $ccount;
        $list["data"] = $data;
        echo json_encode($list);
    }

    public function cflist()
    {
        $cate = M('catelog');
//        echo $ccount;
        $map['catelog_del'] = 'no';
        $data = $cate->where($map)->select();
        foreach ($data as $key => $value) {

            $data[$key]["leibie"] = $value["catelog_name"];
        }
        $list["msg"] = "";
        $list["code"] = 0;
        $list["data"] = $data;
        echo $this->ajaxReturn($list,'json');
    }

    public function cadd()
    {
        $data['catelog_name'] = I("post.catelog_name");

        $cate = M("catelog");

        //判断用户名的唯一性
        $map["catelog_name"] = I("post.catelog_name");
        if (!$cate->where($map)->select()) {

            if ($cate->data($data)->add()) {
                $res["code"] = 0;
                $res["msg"] = "添加成功";
                $res["data"] = "";

            } else {
                $res["code"] = 102;
                $res["msg"] = "出现错误";
                $res["data"] = "";
            }
        } else {
            $res["code"] = 101;
            $res["msg"] = "已存在";
            $res["data"] = "";
        }
        echo json_encode($res);
    }

    public function cmodify()
    {
        $data['catelog_name'] = I("post.catelog_name");

        $cate = M("catelog");

        $catelog_id = I("post.catelog_id");
        $map1["catelog_id"] = $catelog_id;
        $map["catelog_name"] = I("post.catelog_name");
        if (!$cate->where($map)->select()) {

            if ($cate->where($map1)->save($data)) {
                $res["code"] = 0;
                $res["msg"] = "";
                $res["data"] = "";

            } else {
                $res["code"] = 102;
                $res["msg"] = "出现错误";
                $res["data"] = "";
            }
        } else {
            $res["code"] = 101;
            $res["msg"] = "数据出错";
            $res["data"] = "";
        }
        echo json_encode($res);
    }

    public function cdel()
    {
        $catelog_id = I("post.catelog_id");
        $map["catelog_id"] = $catelog_id;
        $cate = M("catelog");
        $data["catelog_del"] = "yes";
        $result = $cate->where($map)->save($data);
        if ($result) {
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