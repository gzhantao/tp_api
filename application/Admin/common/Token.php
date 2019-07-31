<?php
/**
 * Created by PhpStorm.
 * User: 大丶象
 * Date: 2019/7/31
 * Time: 14:18
 */

namespace app\Admin\common;
/**
 * token生成规则 jwt
 * Class Token
 * @package app\Admin\common
 */

class Token
{
    protected $header = [
        'alg'   =>  'HS256',
        'typ'   =>  'JWT'
    ];
    //iss (issuer)：签发人
    //exp (expiration time)：过期时间
    //sub (subject)：主题
    //aud (audience)：受众
    //nbf (Not Before)：生效时间
    //iat (Issued At)：签发时间
    //jti (JWT ID)：编号
    //可自定义相关负载
    protected /** @noinspection PropertyCanBeStaticInspection */
        $payload = [
        'iss'   =>  '',
        'exp'   =>  '',
        'sub'   =>  '',
        'aud'   =>  '',
        'nbf'   =>  '',
        'iat'   =>  '',
        'jti'   =>  ''
    ];
    protected $secret = '03C@hf1lFjiJWJ#!$V*HkeBJ0T2S#yCs';      //加密秘钥
    protected $token;
    protected $sign;

    /**
     * Token constructor.
     * @param $param
     */
    public function __construct($param) {
        $this->payload['ial'] = time();     //签发时间
        $this->payload = array_merge($this->payload,$param);
    }

    /**
     * base64、url_encode编码
     * @param $data
     * @return string
     */
    public function base64_url_encode($data){
        $json = json_encode($data);
        $base64 = base64_encode($json);
        return urlencode($base64);
    }

    /**
     *
     */
    public function build_token(){
        $header = $this->base64_url_encode($this->header);
        $payload = $this->base64_url_encode($this->payload);
        $str = $header. '.' .$payload;
        $this->token = hash_hmac('sha256',$str,$this->secret);
        $this->sign = $str. '.' .$this->token;
        return [
            'token' =>  $this->token,
            'sign'  =>  $this->sign
        ];
    }
}