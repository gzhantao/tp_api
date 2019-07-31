<?php
/**
 * Created by PhpStorm.
 * User: 大丶象
 * Date: 2019/7/31
 * Time: 13:46
 */

namespace app\Admin\controller;
use app\Admin\common\Request;
use app\Admin\validate\Field;
use lib\Log;
use think\Controller;

class Base extends Controller
{
    protected $token;
    protected $input;
    public function initialize(){
        parent::initialize();
        $this->request_method();        //请求方式校验
        $this->request_data();
        $this->check_token();
    }

    /**
     * 请求参数
     */
    public function request_data(){
        $request = file_get_contents('php://input');
        $this->token = \request()->get('token');
        $this->input = json_decode($request,true);
        Log::write($this->input, 'Request');
    }

    /**
     * 校验token
     */
    public function check_token(){
        if(!in_array(\request()->pathinfo(), config('config.token'), true) && !$this->token){
            $this->call_back('100001');
        }
    }

    /**
     * 错误返回
     * @param        $code
     * @param string $msg
     * @param array  $data
     */
    public function call_back($code,$msg='',$data=[]){
        $return = [];
        $code_conf = config('code.');
        if($code){
            $return['code'] = $code;
            $return['msg'] = $code_conf[$code];
        }
        if($msg){
            $return['msg'] = $msg;
        }
        if($data){
            $return['data'] = $data;
        }
        Log::write($return,'Response');
        Log::save();
        echo (json_encode($return,true));exit;
    }

    /**
     * 请求方式
     */
    public function request_method(){
        $request = new Request();
        if($request->method() !== true){
            $this->call_back('100000');
        }
    }

    /**
     * 字段自动校验
     * @param array  $data
     * @param string $scene
     */
    public function field_validate($data=[],$scene=''){
        $field = new Field();
        if (!$field->scene($scene)->check($data)) {
            $this->call_back('100002',$field->getError());
        }
    }
}