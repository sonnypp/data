<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/2/28
 * Time: 15:34
 */



function cmp($a,$b) {
    if($a["xiaoshouliang"] == $b["xiaoshouliang"] ) return 0;
    return $a["xiaoshouliang"] < $b["xiaoshouliang"]?1:-1;
}


//易宝支付签名
function HmacMd5($data, $key)
{
    //需要配置环境支撑iconv，否则中文参数不能正常处理
    $key = iconv("GB2312", "UTF-8", $key);
    $data = iconv("GB2312", "UTF-8", $data);
    $b = 64;
    if (strlen($key) > $b) {
        $key = pack("H*", md5($key));
    }
    $key = str_pad($key, $b, chr(0x00));
    $ipad = str_pad('', $b, chr(0x36));
    $opad = str_pad('', $b, chr(0x5c));
    $k_ipad = $key ^ $ipad;
    $k_opad = $key ^ $opad;
    return md5($k_opad . pack("H*", md5($k_ipad . $data)));
}




