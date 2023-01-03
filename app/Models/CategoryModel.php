<?php
namespace MVC\Models;
use MVC\core\DBH;
use MVC\core\DB;
class CategoryModel extends DB{
public function GetAllCategories(){
    $data=$this->select();
return $data;
}
public function insertNewCategory($name){
    $this->insert($name);
    
}
public function DeleteCategory($id){
    $this->delete($id);
}
public function GetCategoryByid($id){
    $data=$this->All("SELECT*FROM`Category`WHERE`id`='$id'");
    return $data;
}
public function UpdateCatogry($data){
    $trunary=$this->update($data);

return $trunary;

}
}