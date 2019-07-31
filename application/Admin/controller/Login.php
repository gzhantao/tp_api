<?php
/**
 * Created by PhpStorm.
 * User: 大丶象
 * Date: 2019/7/31
 * Time: 13:45
 */

namespace app\Admin\controller;

use app\Admin\common\Token;

class Login extends Base
{

    public function index(){
        $this->field_validate($this->input,'login');
        $token = new Token(['uid'=>1]);
        $return = $token->build_token();
        $this->call_back('000000', '登录成功',['token'=>$return['token']]);
    }
}