<?php
namespace MVC\Models;
use MVC\core\DBH;
use MVC\core\DB;
class USERSMODEL extends DB{
//     public $table='users';
//     protected $object;
 
//     public  function show_user(){
// $data=$this->select();
// return $data;
//     }
public function showAll(){
$data=$this->select();
return $data;

}
public function get_all($data){
    $all=$this->insert($data);
if(!empty($all)){
echo 'succccss';
}else{
    echo'noooot';
}
}
public function update_user($data){
    $all=$this->update($data);
if(!empty($all)){
echo 'succccss';
}else{
    echo'noooot';
}
}
public function delete_user($id){
    $all=$this->delete($id);
if(!empty($all)){
echo 'succccss';
}else{
    echo'noooot';
}
}
public function GetAllUserData($email,$password){
    $userdata=$this->All("SELECT * FROM `user`where`email`='$email'AND`password`='$password'");
    if(!empty($userdata)){
return $userdata;
    }else{
        return false;
    }


}


}