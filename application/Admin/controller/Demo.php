<?php
/**
 * Created by PhpStorm.
 * User: 大丶象
 * Date: 2019/7/30
 * Time: 13:39
 */

namespace app\admin\controller;
use think\Controller;

/**
 * @title 登录接口
 * @description 接口说明
 * @header name:key require:1 default: desc:秘钥(区别设置)
 * @param name:public type:int require:1 default:1 other: desc:公共参数(区别设置)
 */
class Demo extends Controller
{

    /**
     * @title 登录接口
     * @description 接口说明
     * @author 开发者
     * @url /index/demo/login
     * @method GET

     * @param name:name type:int require:1 default:1 other: desc:用户名
     * @param name:pass type:int require:1 default:1 other: desc:密码
     *
     * @return name:名称
     * @return mobile:手机号
     *
     */
    public function login()
    {
        echo json_encode(["code"=>200, "message"=>"success", "data"=>[request()->param()]]);
    }

    /**
     * @title 注册接口
     * @description 接口说明
     * @author 开发者
     * @url /index/demo/reg
     * @method GET

     * @param name:name type:int require:1 default:1 other: desc:用户名
     * @param name:pass type:int require:1 default:1 other: desc:密码
     *
     * @return name:名称
     * @return mobile:手机号
     *
     */
    public function reg()
    {
        echo json_encode(["code"=>200, "message"=>"success", "data"=>[request()->param()]]);
    }
}
