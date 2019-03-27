<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/14
 * Time: 14:23
 */

namespace Home\Model;


use Think\Model;

class OnebannerModel extends Model
{
    protected $tableName = "onebanner";
    protected $fields = array('one_banner_id','one_banner_describe','one_banner_date','one_banner_pic','one_banner_isInstead','one_banner_isDel');
    protected $pk = 'one_banner_id';
}