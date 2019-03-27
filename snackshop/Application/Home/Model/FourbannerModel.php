<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/14
 * Time: 14:28
 */

namespace Home\Model;


use Think\Model;

class FourbannerModel extends Model
{
    protected $tableName = "fourbanner";
    protected $fields = array('four_banner_id','four_banner_pic','four_banner_isInstead','four_banner_isDel','four_banner_describe','four_banner_date');
    protected $pk = 'four_banner_id';
}