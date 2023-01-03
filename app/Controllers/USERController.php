<?php
namespace MVC\Controllers;
use MVC\core\DB;
use MVC\core\Controller;
use MVC\Models\USERSMODEL;
use MVC\core\Helpers;
use MVC\core\SESSION;
class USERController extends Controller{
    protected $object;
    public function __construct(){
        $this->object=new USERSMODEL();
        SESSION::start();

    }

    public function app(){
$u1=new DB();
$u1->insert(['name'=>'alii']);

    }
    public function login(){
        SESSION::start();
        return $this->view('home/login');

    }
    public function dashbord(){
        return $this->view('back/index');
    }
    public function CheakUser(){
        
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cheak=$this->object->GetAllUserData($email,$password);
// \print_r($cheak);die;
      if($cheak){
        SESSION::set('user',$cheak);
        SESSION::set('errors',[]);
        Helpers::rediract('user/dashbord');
        
    
    }else{
        $Error='name or email not right';
        SESSION::set('errors',$Error);
// $this->view('home/login',['error'=>$Error]);
        Helpers::rediract('user/login');

        }
    }
    public function logout(){
        SESSION::stop();
        
            return   Helpers::rediract('user/login');
        
    }
}
