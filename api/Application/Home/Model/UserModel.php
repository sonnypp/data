<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/1
 * Time: 13:10
 */

namespace Admin\Model;
use think\Model;

class UserModel extends Model
{
    protected $tableName = "user";
    protected $fields = array('user_id','user_name','user_pw','user_type','user_realname','user_address','user_sex','user_tel','user_email','user_qq','user_man','user_age','user_xueli','user_birthday','user_del','user_one1','user_one2','user_one3','user_one4','user_one5','user_one6','user_one7','user_one8','user_one9','user_one10','user_one11','user_one12');
    protected $pk = 'user_id';

}