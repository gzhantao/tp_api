<?php
/**
 * Created by PhpStorm.
 * User: 大丶象
 * Date: 2019/7/31
 * Time: 14:09
 */

namespace app\Admin\validate;
use think\Validate;

class Field extends Validate
{
    //验证规则
    protected $rule = [
        'username|用户名'      =>  'require|length:6,20|alphaNum',
        'password|密码'       =>  'require|length:6,20'
    ];

    protected $message = [];

    protected $scene = [
        'login'  =>  ['username','password'],
    ];
}