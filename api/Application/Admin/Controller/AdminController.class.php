<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:22
 */

namespace Admin\Controller;


use Think\Controller;

class AdminController extends Controller
{

    public function login() {
        $username = I("post.username");
        $password = I("post.password");

        $admin = M("admin");

        $map["userName"] = $username;
        $map["userPw"] = $password;
        $result = $admin->where($map)->find();
        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
            $gonggao = M("gonggao");
            $g_data["gonggao_title"] = "管理员登陆";
            $g_data["gonggao_content"] = "管理员于".date("Y-m-d H:i:s",time())."登陆管理系统";
            $g_data["gonggao_date"] = date("Y-m-d H:i:s",time());
            $gonggao->data($g_data)->add();
        } else {
            $res["code"] = 102;
            $res["msg"] = "信息有误";
            $res["data"] = "";
        }
        echo $this->ajaxReturn($res,'json');
    }
}