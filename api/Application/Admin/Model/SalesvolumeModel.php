<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/26
 * Time: 22:55
 */

namespace Admin\Model;


use Think\Model;

class SalesvolumeModel extends Model
{
    protected $tableName = "salesvolume";
    protected $fields = array('data_id','data_num','data_week','data_catelog_id');
    protected $pk = 'data_id';
}