<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:36
 */

namespace Admin\Model;


use Think\Model;

class OrderitemModel extends Model
{
    protected $tableName = "orderitem";
    protected $fields = array(
        'orderItem_id',
        'order_id',
        'goods_id',
        'goods_quantity'
    );
    protected $pk = 'orderItem_id';
}