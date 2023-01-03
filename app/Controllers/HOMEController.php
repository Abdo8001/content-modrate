<?php
namespace MVC\Controllers;
use MVC\core\Controller;
use MVC\core\DBH;
use MVC\Models\USERSMODEL;
use MVC\Models\Site_settingModel;
class HOMEController extends Controller{
    protected $object;
    public function __construct(){
        $this->object=new USERSMODEL();
    }
    public function index(){
$w=new DBH();
echo"<pre>";
$all=$this->object->showAll();
print_r($all);

    }
    public function add(){
       return $this->view("home");
    }
    public function show(){
$data=$this->object->get_all(['name'=>'mahmehooo','team'=>'mialln']);
\print_r($data);
    }
    public function update(){
$data=$this->object->update_user(['name'=>'koadsm','team'=>'realmadrid','id'=>'9']);
\print_r($data);
    }
    public function delete(){
$data=$this->object->delete_user(9);
\print_r($data);
    }
    public function login(){
        $this->view('home/login');
    }
    public function theam(){
        $obj=new Site_settingModel();

        $them=$obj->SiteSetting('theam1');
        return $this->view('website/'.$them);
    }
}