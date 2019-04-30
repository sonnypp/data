<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/26
 * Time: 13:16
 */

namespace Home\Controller;


use Think\Controller;

class PayController extends Controller
{
    public function info()
    {
        //购物车
        $shop_car = I("session.shop_cart");
        if (!$shop_car) {
            $num = 0;
        } else {
            $num = count($shop_car);
        }

        //获取用户信息
        $user = I("session.user");

        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $sum = 0;
        foreach ($shop_car as $k => $item) {
            $sum += intval($item["sum"]);
        }
        $sum = number_format($sum, 2, '.', '');
        $this->assign("logo_img", $logo_pic["logo_pic"]);
        $this->assign("user", $user);
        $this->assign("num", $num);
        $this->assign("p2_Order", date("YmdHis", time()) . mt_rand(0, 9999));
        $this->assign("p3_Amt", 0.01);
        $this->assign("total", $sum);
        if (empty($user) || $user == null) {
            $this->display("Index:login");

        } else {
            $this->display();
        }
    }

    public function payview()
    {
        session_start();
        $shop_car = I("session.shop_cart");
        if (!$shop_car) {
            $num = 0;
        } else {
            $num = count($shop_car);
        }

        //获取用户信息
        $user = I("session.user");

        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img", $logo_pic["logo_pic"]);
        $this->assign("user", $user);
        $this->assign("shopcart", $shop_car);
        $this->assign("num", $num);


        // 1.获取订单号
        $p0_Cmd = "Buy";
        $p1_MerId = "10001126856";
        $p2_Order = I("post.p2_Order");
        $p3_Amt = I("post.p3_Amt");
        $p4_Cur = "CNY";
        // 商品名称
        $p5_Pid = "";
        $p6_Pcat = ""; // 商品种类
        $p7_Pdesc = ""; // 商品介绍
        // 只是易宝支付成功后，给url返回信息
        $p8_Url = "http://" . $_SERVER['SERVER_NAME'] . "/snackshop/index.php/pay/res";
//        var_dump($p8_Url);exit;
        $p9_SAF = "0"; // 送货地址
        $pa_MP = ""; // 额外介绍
        $pd_FrpId = I("post.pd_FrpId"); // 支付通道
        $pr_NeedResponse = "1"; // 应答机制
//        if($p2_Order == "" || $p3_Amt == "" ) {
//            $this->display("Index:shopcart");
//        }
        $res = array();
        $res["p0_Cmd"] = $p0_Cmd;
        $res["p1_MerId"] = $p1_MerId;
        $res["p2_Order"] = $p2_Order;
        $res["p3_Amt"] = $p3_Amt;
        $res["p4_Cur"] = $p4_Cur;
        $res["p5_Pid"] = $p5_Pid;
        $res["p6_Pcat"] = $p6_Pcat;
        $res["p7_Pdesc"] = $p7_Pdesc;
        $res["p8_Url"] = $p8_Url;
        $res["p9_SAF"] = $p9_SAF;
        $res["pa_MP"] = $pa_MP;
        $res["pd_FrpId"] = $pd_FrpId;
        $res["pr_NeedResponse"] = $pr_NeedResponse;
        $res["price"] = number_format(I("post.total"), 2, '.', '');
        switch ($pd_FrpId) {
            case "CMBCHINA-NET":
                $res["payway"] = "招商银行";
                break;
            case "ICBC-NET":
                $res["payway"] = "工商银行";
                break;
            case "ABC-NET":
                $res["payway"] = "农业银行";
                break;
            case "CCB-NET":
                $res["payway"] = "建设银行";
                break;
            case "CMBC-NET":
                $res["payway"] = "中国民生银行总行";
                break;
            case "CEB-NET":
                $res["payway"] = "光大银行";
                break;
            case "BOCO-NET":
                $res["payway"] = "交通银行";
                break;
            case "SDB-NET":
                $res["payway"] = "深圳发展银行";
                break;
            case "BCCB-NET":
                $res["payway"] = "北京银行";
                break;
            case "CIB-NET":
                $res["payway"] = "兴业银行";
                break;
            case "SPDB-NET":
                $res["payway"] = "上海浦东发展银行";
                break;
            case "ECITIC-NET":
                $res["payway"] = "中信银行";
                break;
            default:
                $res["pd_FrpId"] = "ICBC-NET";
                $res["payway"] = "工商银行";
                break;
        }
        session("payway", $res["payway"]);
        // 我们把请求参数一个一个拼接(拼接的时候，顺序很重要!!)
        $data = "";
        $data = $data . $p0_Cmd;
        $data = $data . $p1_MerId;
        $data = $data . $p2_Order;
        $data = $data . $p3_Amt;
        $data = $data . $p4_Cur;
        $data = $data . $p5_Pid;
        $data = $data . $p6_Pcat;
        $data = $data . $p7_Pdesc;
        $data = $data . $p8_Url;
        $data = $data . $p9_SAF;
        $data = $data . $pa_MP;
        $data = $data . $pd_FrpId;
        $data = $data . $pr_NeedResponse;

        $merchantKey = "69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl";
        // hmac是签名串，是用于易宝和商家互相确认的关键字
        // 这里我们需要使用算法来生成(md5-hmac算法)
        $hmac = HmacMd5($data, $merchantKey);
        $res["hmac"] = $hmac;

        if (empty($user) || $user == null) {
            $this->display("Index:login");

        } else {
            $this->assign("data", $res);
            $this->display();
        }


    }

    public function payresview()
    {
        session_start();
        $payway = I("session.payway");
        //购物车
        $shop_car = I("session.shop_cart");

        //获取用户信息
        $user = I("session.user");

        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img", $logo_pic["logo_pic"]);
        $this->assign("user", $user);

        $p1_MerId = "10001126856";
        $r0_Cmd = $_REQUEST['r0_Cmd'];
        $r1_Code = $_REQUEST['r1_Code'];
        $r2_TrxId = $_REQUEST['r2_TrxId'];
        $r3_Amt = $_REQUEST['r3_Amt'];
        $r4_Cur = $_REQUEST['r4_Cur'];
        $r5_Pid = $_REQUEST['r5_Pid'];
        $r6_Order = $_REQUEST['r6_Order'];
        $r7_Uid = $_REQUEST['r7_Uid'];
        $r8_MP = $_REQUEST['r8_MP'];
        $r9_BType = $_REQUEST['r9_BType'];
        $hmac = $_REQUEST['hmac'];

        // 拼接
        $res_src = "";
        $res_src = $res_src . $p1_MerId;
        $res_src = $res_src . $r0_Cmd;
        $res_src = $res_src . $r1_Code;
        $res_src = $res_src . $r2_TrxId;
        $res_src = $res_src . $r3_Amt;
        $res_src = $res_src . $r4_Cur;
        $res_src = $res_src . $r5_Pid;
        $res_src = $res_src . $r6_Order;
        $res_src = $res_src . $r7_Uid;
        $res_src = $res_src . $r8_MP;
        $res_src = $res_src . $r9_BType;
        $merchantKey = "69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl";

        // 对返回的结果进行MD5-hmac加密处理，和返回的hmac签名串比较
        if (HmacMd5($res_src, $merchantKey) == $hmac) {
            if ($r1_Code == 1) {
                $sum = 0;
                foreach ($shop_car as $k => $item) {
                    $sum += intval($item["sum"]);
                }

                $order = M("order");
                $o_Data["order_bianhao"] = $r6_Order;
                $o_map["order_bianhao"] = $r6_Order;
                $flag = $order->where($o_map)->find();
                if ($flag) {
                    $o_Res = 0;
                } else {
                    $o_Data["order_date"] = date("Y-m-d H:i:s", time());
                    $o_Data["order_songhuodizhi"] = $user["user_address"];
                    $o_Data["order_fukuangfangshi"] = $payway;
                    $o_Data["order_jine"] = $sum;
                    $o_Data["order_user_id"] = $user["user_id"];
                    $o_Res = $order->data($o_Data)->add();
                }

//                var_dump($o_Res);
//                exit;
                if ($o_Res) {
                    $week = date("w", time());
                    foreach ($shop_car as $k => $item) {
                        $orderitem = M("orderitem");
                        //销售量 销售额统计
                        $sales = M("sales");
                        $salesvolume = M("salesvolume");
                        $map["data_catelog_id"] = $item["goods_catelog_id"];
                        $map["data_week"] = $week;

                        $i_Data["order_id"] = $o_Res;
                        $i_Data["goods_id"] = $item["goods_id"];
                        $i_Data["goods_quantity"] = $item["quantity"];
                        $i_Res = $orderitem->data($i_Data)->add();

                        if ($i_Res) {
                            $flag = $sales->where($map)->find();
                            $cur = 0;
                            if ($flag) {
                                $data_sales["data_total"] = intval($flag["data_total"]) + intval($item["sum"]);
                                if ($sales->where($map)->data($data_sales)->save()) {
                                    $cur = 1;
                                }
                            } else {
                                $data_sales["data_catelog_id"] = $item["goods_catelog_id"];
                                $data_sales["data_week"] = $week;
                                $data_sales["data_total"] = intval($item["sum"]);
                                if ($sales->data($data_sales)->add()) {
                                    $cur = 1;
                                }
                            }
                            if ($cur) {
                                $flag_volume = $salesvolume->where($map)->find();
                                if ($flag_volume) {
                                    $data_salesvolume["data_num"] = intval($flag_volume["data_num"]) + intval($item["quantity"]);
                                    $salesvolume->where($map)->data($data_salesvolume)->save();
                                } else {
                                    $data_salesvolume["data_catelog_id"] = $item["goods_catelog_id"];
                                    $data_salesvolume["data_week"] = $week;
                                    $data_salesvolume["data_num"] = intval($item["quantity"]);
                                    $salesvolume->data($data_salesvolume)->add();
                                }
                            }
                        }
                    }
                    if ($i_Res) {
                        session("shop_cart", array());
                        session("payway", null);
                    }
                }

                if ($r9_BType == 1) {
                    $res["code"] = 0;
                    $res["msg"] = '交易成功！';
                    $res["order"] = $r6_Order;
                    $res["jine"] = number_format($sum, 2, '.', '');;
                    $res["yeepaynum"] = $r2_TrxId;
//                    echo '交易成功！';
//                    echo '订单号为' . $r6_Order . '支付成功！' . '所付金额是' . $r3_Amt . '易宝支付订单号' . $r2_TrxId;
                } elseif ($r9_BType == 2) {
                    $res["code"] = 0;
                    $res["msg"] = '交易成功！';
                    $res["order"] = $r6_Order;
                    $res["jine"] = number_format($sum, 2, '.', '');
                    $res["yeepaynum"] = $r2_TrxId;
//                    echo '<br/>交易成功！';
//                    echo '<br/>服务器点对点通讯';
                }
            }
        } else {
            $res["code"] = 102;
            $res["msg"] = '签名被篡改了！';
            $res["order"] = "";
            $res["jine"] = "";
            $res["yeepaynum"] = "";
//            echo '签名被篡改了';
        }
        $this->assign("data", $res);
        $this->display();
    }


    public function payres()
    {
        session_start();
        $payway = I("session.payway");
        //购物车
        $shop_car = I("session.shop_cart");

        //获取用户信息
        $user = I("session.user");

        $logo = M("logo");
        $l_map["logo_isInstead"] = "yes";
        $logo_pic = $logo->where($l_map)->find();
        $this->assign("logo_img", $logo_pic["logo_pic"]);
        $this->assign("user", $user);

        $sum = 0;
        foreach ($shop_car as $k => $item) {
            $sum += intval($item["sum"]);
        }

        $order = M("order");
        $o_Data["order_bianhao"] = I('post.p2_Order');
        $o_map["order_bianhao"] = I('post.p2_Order');
        $flag = $order->where($o_map)->find();
        if ($flag) {
            $o_Res = 0;
        } else {
            $o_Data["order_date"] = date("Y-m-d H:i:s", time());
            $o_Data["order_songhuodizhi"] = $user["user_address"];
            $o_Data["order_fukuangfangshi"] = $payway;
            $o_Data["order_jine"] = $sum;
            $o_Data["order_user_id"] = $user["user_id"];
            $o_Res = $order->data($o_Data)->add();
        }

//                var_dump($o_Res);
//                exit;
        if ($o_Res) {
            $week = date("w", time());
            foreach ($shop_car as $k => $item) {
                $orderitem = M("orderitem");
                //销售量 销售额统计
                $sales = M("sales");
                $salesvolume = M("salesvolume");
                $map["data_catelog_id"] = $item["goods_catelog_id"];
                $map["data_week"] = $week;

                $i_Data["order_id"] = $o_Res;
                $i_Data["goods_id"] = $item["goods_id"];
                $i_Data["goods_quantity"] = $item["quantity"];
                $i_Res = $orderitem->data($i_Data)->add();

                if ($i_Res) {
                    $flag = $sales->where($map)->find();
                    $cur = 0;
                    if ($flag) {
                        $data_sales["data_total"] = intval($flag["data_total"]) + intval($item["sum"]);
                        if ($sales->where($map)->data($data_sales)->save()) {
                            $cur = 1;
                        }
                    } else {
                        $data_sales["data_catelog_id"] = $item["goods_catelog_id"];
                        $data_sales["data_week"] = $week;
                        $data_sales["data_total"] = intval($item["sum"]);
                        if ($sales->data($data_sales)->add()) {
                            $cur = 1;
                        }
                    }
                    if ($cur) {
                        $flag_volume = $salesvolume->where($map)->find();
                        if ($flag_volume) {
                            $data_salesvolume["data_num"] = intval($flag_volume["data_num"]) + intval($item["quantity"]);
                            $salesvolume->where($map)->data($data_salesvolume)->save();
                        } else {
                            $data_salesvolume["data_catelog_id"] = $item["goods_catelog_id"];
                            $data_salesvolume["data_week"] = $week;
                            $data_salesvolume["data_num"] = intval($item["quantity"]);
                            $salesvolume->data($data_salesvolume)->add();
                        }
                    }
                }
            }
            if ($i_Res) {
                session("shop_cart", array());
                session("payway", null);
            }
            $res["code"] = 0;
            $res["msg"] = '交易成功！';
            $res["order"] = I('post.p2_Order');
            $res["jine"] = number_format($sum, 2, '.', '');;
            $res["yeepaynum"] = date("YmdHis", time()) . randomkeys(8);
        } else {
            $res["code"] = 102;
            $res["msg"] = '签名被篡改了！';
            $res["order"] = "";
            $res["jine"] = "";
            $res["yeepaynum"] = "";
//            echo '签名被篡改了';
        }
        $this->assign("data", $res);
        $this->display();
    }
}