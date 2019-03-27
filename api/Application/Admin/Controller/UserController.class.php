<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:06
 */

namespace Admin\Controller;
use think\Controller;

class UserController extends Controller
{
    public function uindex() {

    }

    /**
     * 添加用户
     */
    public function uadd() {
        $data['user_name'] = I("post.user_name");
        $data['user_pw'] = I("post.user_pw");
        $data['user_realname'] = I("post.user_realname");
        $data['user_sex'] = I("post.user_sex");
        $data['user_tel'] = I("post.user_tel");
        $data['user_qq'] = I("post.user_qq");
        $data['user_address'] = I("post.user_address");

        $user = M("user");//实例化User对象

        //判断用户名的唯一性
        $map["user_name"] = I("post.user_name");
        if(!$user->where($map)->select()) {

            if($user->data($data)->add()) {
                $res["code"] = 0;
                $res["msg"] = "添加成功";
                $res["data"] = "";

            } else {
                $res["code"] = 102;
                $res["msg"] = "添加出现错误";
                $res["data"] = "";
            }
        } else {
            $res["code"] = 101;
            $res["msg"] = "用户已存在";
            $res["data"] = "";
        }
        echo json_encode($res);
    }

    /**
     * 获取用户列表
     */
    public function ulist() {
        $user = M('user');
        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);

        $start = $limit * ($page - 1);

//        echo $ccount;
        $map['user_del'] = 'no';
        $ccount = count($user->where($map)->select());
        $data = $user->where($map)->limit($start,$limit) -> select();
        $res["msg"] = "";
        $res["code"] = 0;
        $res["count"] = $ccount;
        $res["data"] = $data;

        echo $this->ajaxReturn($res,'json');  //json数据的返回

    }

    /**
     * 获取单个用户的详细信息
     */
    public function udetail() {
        $user_id = I("get.user_id");
        $map["user_id"] = $user_id;
        $user = M("user");
        $data = $user->where($map)->select();
        if($data) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = $data;
        } else {
            $res["code"] = 102;
            $res["msg"] = "数据操作有误";
            $res["data"] = "";
        }

        echo json_encode($res);
    }

    /**
     * 删除用户 这里并不是真正的删除 而是将该用户标记为已删除
     */
    public function udelete() {
        $user_id = I("post.user_id");
        $map["user_id"] = $user_id;
        $user = M("user");
        $data["user_del"] = "yes";
        $result = $user->where($map)->save($data);
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

    /**
     * 修改用户信息
     */
    public function umodify() {
        $data['user_name'] = I("post.user_name");
        $data['user_pw'] = I("post.user_pw");
        $data['user_realname'] = I("post.user_realname");
        $data['user_sex'] = I("post.user_sex");
        $data['user_tel'] = I("post.user_tel");
        $data['user_qq'] = I("post.user_qq");
        $data['user_address'] = I("post.user_address");

        $user_id = I("post.user_id");
        $map["user_id"] = $user_id;

        $user = M("user");//实例化User对象

        $result = $user->where($map)->save($data);
        if($result) {
            $res["code"] = 0;
            $res["msg"] = "修改成功";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "修改失败";
            $res["data"] = "";
        }
        echo json_encode($res);
    }

    //获取用户信息
    public function getuser()
    {
        $user_id = I("post.id");
        $map["user_id"] = $user_id;
        $user = M("user");
        $info = $user->where($map)->find();
        if($info) {
            $res['code'] = 0;
            $res['msg'] = "";
            $res['data'] = $info;
        } else {
            $res['code'] = 102;
            $res['msg'] = "";
            $res['data'] = "";
        }
        echo $this->ajaxReturn($res,'json');
    }

}