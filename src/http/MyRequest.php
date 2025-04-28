<?php 
//MyRequest
namespace Suxianjia\xianjiamessagepush\http;

class MyRequest
{
    public static function get($key, $default = null)
    {
        return request()->input($key, $default);
    }
    
    public static function post($key, $default = null)
    {
        return request()->input($key, $default);
    }
    
    public static function all()
    {
        return request()->all();
    }
    
    public static function has($key)
    {
        return request()->has($key);
    }
    
    public static function isMethod($method)
    {
        return request()->isMethod($method);
    }
}