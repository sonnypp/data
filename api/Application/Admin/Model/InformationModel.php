<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/8
 * Time: 14:40
 */

namespace Admin\Model;


use Think\Model;

class InformationModel extends Model
{
    protected $tableName = "information";
    protected $fields = array('information_id','information_name','information_content','information_pic','information_isShow','information_date');
    protected $pk = 'infromation_id';
}