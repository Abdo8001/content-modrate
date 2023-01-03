<?php

namespace MVC\core;
class APP{
    private $controller;//controler from url
    private $method;// methode at controller class
    private $parms;// if  there is parmeter   send at url
public function __construct(){
    $this->url();
    $this->render();
}
    private function url(){
    if(!empty($_SERVER['QUERY_STRING'])){
    $url=explode("/",$_SERVER['QUERY_STRING']);
    $this->controller=isset($url[0])?$url[0]:"home";
    $this->method=isset($url[1])?$url[1]:"index";
    unset($url[0],$url[1]);
$this->parms=array_values($url);  
}
}
private function render(){
    $controller="MVC\\Controllers\\".$this->controller."Controller";
    // echo $controller;die;
        if(class_exists($controller)){
         $controller=new $controller   ;
         if(method_exists($controller,$this->method)){
            $x=$this->parms;
            call_user_func_array([$controller,$this->method],$this->parms);
         }

        }
    
}
}