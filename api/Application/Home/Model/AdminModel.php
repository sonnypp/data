<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:22
 */

namespace Admin\Model;


use Think\Model;

class AdminModel extends Model
{
    protected $tableName = "admin";
    protected $fields = array('userId','userName','userPw');
    protected $pk = 'userId';
}