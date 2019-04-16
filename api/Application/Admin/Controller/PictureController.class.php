<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/14
 * Time: 16:05
 */

namespace Admin\Controller;


use Think\Controller;

class PictureController extends Controller
{
    //首页banner1图片相关操作
    public function banner1()
    {
        $banner = M("onebanner");
        $map['one_banner_isDel'] = 'no';

        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);

        $ccount = count($banner->where($map)->select());

        $data = $banner->limit($start,$limit) ->where($map)->select();

        foreach ($data as $key => $value) {
            $data[$key]['pic'] = '/api/Public' . $value["one_banner_pic"];
        }

        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $ccount;
        $res["data"] = $data;
        echo $this->ajaxReturn($res,'json');
    }
    public function addbanner1()
    {
        $data["one_banner_describe"] = I("post.describe");
        $data["one_banner_pic"] = I("post.bannerimg");
        $data["one_banner_date"] = time();
//        var_dump($data);
//        exit;
        $banner = M("onebanner");
        //为了防止多次上传，检测是否同名
        $map["one_banner_pic"] = $data["one_banner_pic"];
        $flag = $banner->where($map)->find();
        if($flag) {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $result = $banner->data($data)->add();
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
    public function modifybanner1()
    {
        $id = I("post.one_banner_id");

        $banner = M("onebanner");
        $map["one_banner_isDel"] = "no";
        $list = $banner->where($map)->select();
        foreach ($list as $k => $v) {
            $map["one_banner_id"] = $v["one_banner_id"];
            $data["one_banner_isInstead"] = "no";
            if($v["one_banner_id"] == $id) {
                $data["one_banner_isInstead"] = "yes";
            }
            $result = $banner->where($map)->save($data);
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
    public function delbanner1()
    {
        $id = I("post.one_banner_id");

        $banner = M("onebanner");
        $map["one_banner_id"] = $id;
        //为了安全 不影响界面运行
        $dd = $banner->where($map)->find();

        if($dd["one_banner_isinstead"] == 'yes') {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $data["one_banner_isDel"] = "yes";
            $result = $banner->where($map)->data($data)->save();
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
    //首页banner2图片相关操作
    public function banner2()
    {
        $banner = M("twobanner");
        $map['two_banner_isDel'] = 'no';

        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);

        $ccount = count($banner->where($map)->select());

        $data = $banner->limit($start,$limit) ->where($map)->select();
        foreach ($data as $key => $value) {
            $data[$key]['pic'] = '/api/Public' . $value["two_banner_pic"];
        }

        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $ccount;
        $res["data"] = $data;
        echo $this->ajaxReturn($res,'json');
    }
    public function addbanner2()
    {
        $data["two_banner_describe"] = I("post.describe");
        $data["two_banner_pic"] = I("post.bannerimg");
        $data["two_banner_date"] = time();
//        var_dump($data);
//        exit;
        $banner = M("twobanner");
        //为了防止多次上传，检测是否同名
        $map["two_banner_pic"] = $data["two_banner_pic"];
        $flag = $banner->where($map)->find();
        if($flag) {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $result = $banner->data($data)->add();
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
    public function modifybanner2()
    {
        $id = I("post.two_banner_id");

        $banner = M("twobanner");
        $map["two_banner_isDel"] = "no";
        $list = $banner->where($map)->select();
        foreach ($list as $k => $v) {
            $map["two_banner_id"] = $v["two_banner_id"];
            $data["two_banner_isInstead"] = "no";
            if($v["two_banner_id"] == $id) {
                $data["two_banner_isInstead"] = "yes";
            }
            $result = $banner->where($map)->save($data);
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
    public function delbanner2()
    {
        $id = I("post.two_banner_id");

        $banner = M("twobanner");
        $map["two_banner_id"] = $id;
        //为了安全 不影响界面运行
        $dd = $banner->where($map)->find();

        if($dd["two_banner_isinstead"] == 'yes') {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $data["two_banner_isDel"] = "yes";
            $result = $banner->where($map)->data($data)->save();
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
    //首页banner3图片相关操作
    public function banner3()
    {
        $banner = M("threebanner");
        $map['three_banner_isDel'] = 'no';

        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);

        $ccount = count($banner->where($map)->select());

        $data = $banner->limit($start,$limit) ->where($map)->select();
        foreach ($data as $key => $value) {
            $data[$key]['pic'] = '/api/Public' . $value["three_banner_pic"];
        }
        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $ccount;
        $res["data"] = $data;
        echo $this->ajaxReturn($res,'json');
    }
    public function addbanner3()
    {
        $data["three_banner_describe"] = I("post.describe");
        $data["three_banner_pic"] = I("post.bannerimg");
        $data["three_banner_date"] = time();
//        var_dump($data);
//        exit;
        $banner = M("threebanner");
        //为了防止多次上传，检测是否同名
        $map["three_banner_pic"] = $data["three_banner_pic"];
        $flag = $banner->where($map)->find();
//        var_dump($flag);
//        exit;
        if($flag) {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $result = $banner->data($data)->add();
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
    public function modifybanner3()
    {
        $id = I("post.three_banner_id");

        $banner = M("threebanner");
        $map["three_banner_isDel"] = "no";
        $list = $banner->where($map)->select();
        foreach ($list as $k => $v) {
            $map["three_banner_id"] = $v["three_banner_id"];
            $data["three_banner_isInstead"] = "no";
            if($v["three_banner_id"] == $id) {
                $data["three_banner_isInstead"] = "yes";
            }
            $result = $banner->where($map)->save($data);
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
    public function delbanner3()
    {
        $id = I("post.three_banner_id");

        $banner = M("threebanner");
        $map["three_banner_id"] = $id;
        //为了安全 不影响界面运行
        $dd = $banner->where($map)->find();

        if($dd["three_banner_isinstead"] == 'yes') {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $data["three_banner_isDel"] = "yes";
            $result = $banner->where($map)->data($data)->save();
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

    //推荐页banner图片相关操作
    public function recommendbanner()
    {
        $banner = M("fourbanner");
        $map['four_banner_isDel'] = 'no';

        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);

        $ccount = count($banner->where($map)->select());

        $data = $banner->limit($start,$limit) ->where($map)->select();
        foreach ($data as $key => $value) {
            $data[$key]['pic'] = '/api/Public' . $value["four_banner_pic"];
        }
        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $ccount;
        $res["data"] = $data;
        echo $this->ajaxReturn($res,'json');
    }
    public function addrecbanner()
    {
        $data["four_banner_describe"] = I("post.describe");
        $data["four_banner_pic"] = I("post.bannerimg");
        $data["four_banner_date"] = time();
//        var_dump($data);
//        exit;
        $banner = M("fourbanner");
        //为了防止多次上传，检测是否同名
        $map["four_banner_pic"] = $data["four_banner_pic"];
        $flag = $banner->where($map)->find();
        if($flag) {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $result = $banner->data($data)->add();
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
    public function modifyrecbanner()
    {
        $id = I("post.four_banner_id");

        $banner = M("fourbanner");
        $map["four_banner_isDel"] = "no";
        $list = $banner->where($map)->select();
        foreach ($list as $k => $v) {
            $map["four_banner_id"] = $v["four_banner_id"];
            $data["four_banner_isInstead"] = "no";
            if($v["four_banner_id"] == $id) {
                $data["four_banner_isInstead"] = "yes";
            }
            $result = $banner->where($map)->save($data);
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
    public function delrecbanner()
    {
        $id = I("post.four_banner_id");

        $banner = M("fourbanner");
        $map["four_banner_id"] = $id;
        //为了安全 不影响界面运行
        $dd = $banner->where($map)->find();

        if($dd["four_banner_isinstead"] == 'yes') {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $data["four_banner_isDel"] = "yes";
            $result = $banner->where($map)->data($data)->save();
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

    //logo相关操作
    public function logo()
    {
        $banner = M("logo");
        $map['logo_isDel'] = 'no';

        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);

        $ccount = count($banner->where($map)->select());

        $data = $banner->limit($start,$limit) ->where($map)->select();
        foreach ($data as $key => $value) {
            $data[$key]['pic'] = '/api/Public' . $value["logo_pic"];
        }
        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $ccount;
        $res["data"] = $data;
        echo $this->ajaxReturn($res,'json');
    }
    public function addlogo()
    {
        $data["logo_pic"] = I("post.logoimg");
        $data["logo_date"] = time();
//        var_dump($data);
//        exit;
        $logo = M("logo");
        //为了防止多次上传，检测是否同名
        $map["logo_pic"] = $data["logo_pic"];
        $flag = $logo->where($map)->find();
//        var_dump($flag);
//        exit;
        if($flag) {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $result = $logo->data($data)->add();
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
    public function modifylogo()
    {
        $id = I("post.logo_id");

        $logo = M("logo");
        $map["logo_isDel"] = "no";
        $list = $logo->where($map)->select();
        foreach ($list as $k => $v) {
            $map["logo_id"] = $v["logo_id"];
            $data["logo_isInstead"] = "no";
            if($v["logo_id"] == $id) {
                $data["logo_isInstead"] = "yes";
            }
            $result = $logo->where($map)->save($data);
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
    public function dellogo()
    {
        $id = I("post.logo_id");

        $logo = M("logo");
        $map["logo_id"] = $id;
        //为了安全 不影响界面运行
        $dd = $logo->where($map)->find();

        if($dd["logo_isinstead"] == 'yes') {
            $res["code"] = 101;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $data["logo_isDel"] = "yes";
            $result = $logo->where($map)->data($data)->save();
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




    //上传公共接口
    //上传零食图片 或者资讯图片
    public function upload()
    {
        $config = array(
            'maxSize' => 3145728,
            'rootPath' => 'Public',
            'savePath' => '/image/',
            'saveName' => array('uniqid', time() . mt_rand(1, 9999)),
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub' => false,
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        $info = $upload->upload();
//        var_dump($info);
//        exit;
        if ($info) {
            $res['code'] = 0;
            $res['msg'] = "";
            $res['data'] = $info["file"]['savepath'] . $info["file"]['savename'];
            $this->ajaxReturn($res,'json');
        } else {
            $res['code'] = 102;
            $res['msg'] = "";
            $res['data'] = "";
            $this->ajaxReturn($res,'json');
        }
    }

}