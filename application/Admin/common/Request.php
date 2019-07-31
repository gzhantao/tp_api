<?php
/**
 * Created by PhpStorm.
 * User: 大丶象
 * Date: 2019/7/31
 * Time: 15:12
 */

namespace app\Admin\common;
use think\Controller;

class Request extends Controller
{
    protected $pathinfo;
    protected $config;
    public function initialize()
    {
        parent::initialize();
        $this->pathinfo = request()->pathinfo();
        $this->config = config('request.');
    }

    public function method(){
        $method = request()->method();
        if(!in_array($this->pathinfo, $this->config[$method], true)){
            return false;
        }
        return true;
    }
}