<?php
namespace app\admin\controller;
use lib\Log;
use think\Controller;


class Index extends Controller
{
    public function index(){
        Log::write([
            'username'  =>  '大象',
            'password'  =>  '123'
        ],'测试log','uid:123456789','info');
        $this->test();
    }
    public function test(){
        Log::write([
            'username'  =>  '熊猫',
            'password'  =>  '456'
        ],'测试log---002','uid:123456789','info');
        Log::save();
    }
}
