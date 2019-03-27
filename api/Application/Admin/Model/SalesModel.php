<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/26
 * Time: 22:53
 */

namespace Admin\Model;


use Think\Model;

class SalesModel extends Model
{
    protected $tableName = "sales";
    protected $fields = array('data_id','data_total','data_week','data_catelog_id');
    protected $pk = 'data_id';
}