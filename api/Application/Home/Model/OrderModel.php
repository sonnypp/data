<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:36
 */

namespace Admin\Model;


use Think\Model;

class OrderModel extends Model
{
    protected $tableName = "order";
    protected $fields = array(
        'order_id',
        'order_bianhao',
        'order_date',
        'order_zhuangtai',
        'order_songhuodizhi',
        'order_fukuangfangshi',
        'order_jine',
        'order_user_id'
    );
    protected $pk = 'order_id';

}