<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/14
 * Time: 14:26
 */

namespace Admin\Model;


use Think\Model;

class ThreebannerModel extends Model
{
    protected $tableName = "threebanner";
    protected $fields = array('three_banner_id','three_banner_pic','three_banner_isInstead','three_banner_isDel','three_banner_describe','three_banner_date');
    protected $pk = 'three_banner_id';
}