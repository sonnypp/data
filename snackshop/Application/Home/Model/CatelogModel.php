<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:26
 */

namespace Home\Model;


use Think\Model;

class CatelogModel extends Model
{
    protected $tableName = "catelog";
    protected $fields = array('catelog_id','catelog_name','catelog_miaoshu','catelog_del');
    protected $pk = 'catelog_id';
}