<?php
namespace MVC\core;
class Helpers{
    public static function rediract($path){
        // $var1=extract($variable);
        return header("location:".CSS_PATH.$path);
    }
    public static function Url($path){
        return CSS_PATH.'/'.$path;
    }
}