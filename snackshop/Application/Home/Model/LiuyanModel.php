<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:36
 */

namespace Home\Model;


use Think\Model;

class LiuyanModel extends Model
{
    protected $tableName = "liuyan";
    protected $fields = array(
        'liuyan_id',
        'liuyan_title',
        'liuyan_content',
        'liuyan_date',
        'liuyan_user'
    );
    protected $pk = 'liuyan_id';
}