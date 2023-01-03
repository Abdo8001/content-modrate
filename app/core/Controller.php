<?php
namespace MVC\core;
class Controller{
    public function view($path,$variable=[]){
    extract($variable);
    require Views.$path.".php";
    }
}