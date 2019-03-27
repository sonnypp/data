<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/14
 * Time: 14:29
 */

namespace Admin\Model;


use Think\Model;

class LogoModel extends Model
{
    protected $tableName = "logo";
    protected $fields = array('logo_id','logo_pic','logo_isInstead','logo_isDel','logo_date');
    protected $pk = 'logo_id';
}