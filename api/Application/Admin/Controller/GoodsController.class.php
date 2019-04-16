<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:29
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Upload;

class GoodsController extends Controller
{
    public function findex()
    {

    }

    public function fadd()
    {
        $data["goods_name"] = I("post.goods_name");
        $data["goods_miaoshu"] = strip_tags (I("post.goods_miaoshu"));
        $data["goods_pic"] = I("post.g_picture");
        $data["goods_shichangjia"] = I("post.goods_shichangjia");
        $data["goods_tejia"] = $data["goods_shichangjia"];
        $data["goods_date"] = date("Y-m-d H:i:s",time());
        $data["goods_catelog_id"] = I("post.goods_catelog_id");

        $goods = M("goods");
        $gonggao = M("gonggao");

        $cate = M('catelog')->select();
        foreach ($cate as $key => $value) {
            $catelog[$value['catelog_id']] = $value['catelog_name'];
        }

        $result = $goods->data($data)->add();
        if($result) {
            $g_data["gonggao_title"] = "商家添加新零食";
            $g_data["gonggao_content"] = "商家于".$data["goods_date"]."在类别《".$catelog[$data["goods_catelog_id"]] ."》 添加零食 《".$data["goods_name"]."》";
            $g_data["gonggao_date"] = date("Y-m-d H:i:s",time());
            $gonggao->data($g_data)->add();

            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
        } else {
            $res["code"] = 102;
            $res["msg"] = "数据有误";
            $res["data"] = "";
        }
        $this->ajaxReturn($res,"json");
    }

    //零食列表
    public function flist()
    {
        $food = M('goods');
        $cate = M('catelog')->select();

        foreach ($cate as $key => $value) {
            $catelog[$value['catelog_id']] = $value['catelog_name'];
        }
        $page = I("get.page") ? I("get.page") : 1;
        $page = intval($page);
        $limit = I("get.limit") ? I("get.limit") : 1;
        $limit = intval($limit);
        $start = $limit * ($page - 1);


//        echo $ccount;
        $ccount = count($food->select());
        $data = $food->limit($start, $limit)->select();
        foreach ($data as $key => $value) {
            $data[$key]['goods_miaoshu'] = htmlspecialchars_decode($value['goods_miaoshu']);
            $data[$key]['goods_cate'] = $catelog[$value["goods_catelog_id"]];
            $data[$key]['goods_pic'] = '/api/Public' . $value["goods_pic"];
            $data[$key]['pic'] = '/api/Public' . $value["goods_pic"];
        }
        $list["msg"] = "";
        $list["code"] = 0;
        $list["count"] = $ccount;
        $list["data"] = $data;
        echo json_encode($list);
    }

    //零食下架
    public function fdel()
    {
        $map["goods_id"] = I("post.goods_id");
        $data["goods_Del"] = "yes";

        $goods = M("goods");

        $g_data = $goods->where($map)->find();
        $result = $goods->where($map)->save($data);

        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
            $gonggao = M('gonggao');
            $g_data["gonggao_title"] = "商家零食下架";
            $g_data["gonggao_content"] = "商家于".date("Y-m-d H:i:s",time())."下架零食《".$g_data['goods_name']."》，请大家注意~";
            $g_data["gonggao_date"] = date("Y-m-d H:i:s",time());
            $gonggao->data($g_data)->add();
        } else {
            $res["code"] = 102;
            $res["msg"] = "";
            $res["data"] = "";
        }
        $this->ajaxReturn($res,"json");
    }

    //零食上架
    public function fshangjia() {
        $map["goods_id"] = I("post.goods_id");
        $data["goods_Del"] = "no";

        $goods = M("goods");
        $g_data = $goods->where($map)->find();
        $result = $goods->where($map)->save($data);

        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
            $gonggao = M('gonggao');
            $g_data["gonggao_title"] = "商家零食上架";
            $g_data["gonggao_content"] = "商家于".date("Y-m-d H:i:s",time())."上架零食《".$g_data['goods_name']."》，请大家注意~";
            $g_data["gonggao_date"] = date("Y-m-d H:i:s",time());
            $gonggao->data($g_data)->add();
        } else {
            $res["code"] = 102;
            $res["msg"] = "";
            $res["data"] = "";
        }
        $this->ajaxReturn($res,"json");
    }

    //修改零食价格
    public function fmodify()
    {
        $map["goods_id"] = I("post.goods_id");
        $data["goods_shichangjia"] = I("post.goods_shichangjia");
        $goods = M("goods");
        $g_data = $goods->where($map)->find();
        $result = $goods->where($map)->save($data);

        if($result) {
            $res["code"] = 0;
            $res["msg"] = "";
            $res["data"] = "";
            $gonggao = M('gonggao');
            $g_data["gonggao_title"] = "商家零食价格变动";
            $g_data["gonggao_content"] = "商家于".date("Y-m-d H:i:s",time())."变动零食《".$g_data['goods_name']."》价格，请大家注意~";
            $g_data["gonggao_date"] = date("Y-m-d H:i:s",time());
            $gonggao->data($g_data)->add();
        } else {
            $res["code"] = 102;
            $res["msg"] = "";
            $res["data"] = "";
        }
        $this->ajaxReturn($res,"json");
    }

    //上传零食图片 或者资讯图片
    public function upload()
    {
        $config = array(
            'maxSize' => 3145728,
            'rootPath' => 'Public',
            'savePath' => '/Uploads/',
            'saveName' => array('uniqid', time() . mt_rand(1, 9999)),
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub' => false,
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        $info = $upload->upload();
//        var_dump($info);
//        exit;
        if ($info) {
            $image_path = $info["file"]['savepath'] . $info["file"]['savename'];
            //生成缩略图
            $img = 'Public' . $info["file"]['savepath'] . $info["file"]['savename'];//获取文件上传目录
            $image = new \Think\Image();
            $image->open($img);  //打开上传图片
            $thumb_image_path = $info["file"]['savepath'] . md5(mt_rand()) . $info["file"]['savename'];
            $thumb_image = 'Public' . $thumb_image_path;
            $image->thumb(400, 400, \Think\Image::IMAGE_THUMB_SCALE)->save($thumb_image);//生成等比缩略图
//            echo $image_path . '<br>';
//            echo $thumb_image_path;

            $res['code'] = 0;
            $res['msg'] = "";
            $res['data'] = $thumb_image_path;
            $this->ajaxReturn($res,'json');
        } else {
            $res['code'] = 102;
            $res['msg'] = "";
            $res['data'] = "";
            $this->ajaxReturn($res,'json');
        }
    }
}