<?php
/**
 * Created by PhpStorm.
 * User: 大丶象
 * Date: 2019/7/30
 * Time: 17:31
 */
return [
    'log' =>  [
        'log_path'      =>  './log/'.request()->module(). '/',
        // 缓存类型为File
        'type'  =>  'file',
        // 全局缓存有效期（0为永久有效）
        'expire'=>  0,
        // 缓存前缀
        'prefix'=>  'think',
        // 缓存目录
        'path'  =>  '../runtime/cache/',
        // 日志单独记录
        'apart_level'   =>  true
    ],
    'token' =>  ['admin/login/index']
];