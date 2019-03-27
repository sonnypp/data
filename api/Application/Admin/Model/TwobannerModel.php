<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/14
 * Time: 14:23
 */

namespace Admin\Model;


use Think\Model;

class TwobannerModel extends Model
{
    protected $tableName = "twobanner";
    protected $fields = array('two_banner_id','two_banner_pic','two_banner_isInstead','two_banner_isDel','two_banner_describe','two_banner_date');
    protected $pk = 'two_banner_id';
}