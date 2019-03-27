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







