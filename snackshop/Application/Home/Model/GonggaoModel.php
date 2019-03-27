<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:36
 */

namespace Home\Model;


use Think\Model;

class GonggaoModel extends Model
{
    protected $tableName = "gonggao";
    protected $fields = array('gonggao_id','gonggao_title','gonggao_content','gonggao_date','gonggao_fabuzhe','gonggao_del','gonggao_one1','gonggao_one2','gonggao_one3','gonggao_one4','gonggao_one5','gonggao_one6','gonggao_one7','gonggao_one8');
    protected $pk = 'gonggao_id';
}