<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:36
 */

namespace Admin\Model;


use Think\Model;

class GoodsModel extends Model
{
    protected $tableName = "goods";
    protected $fields = array(
        'goods_id',
        'goods_name',
        'goods_miaoshu',
        'goods_pic',
        'goods_date',
        'goods_yanse',
        'goods_shichangjia',
        'goods_tejia',
        'goods_isnotetejia',
        'goods_isnottuijian',
        'goods_catelog_id',
        'goods_kucun',
        'goods_Del'
    );
    protected $pk = 'goods_id';
}