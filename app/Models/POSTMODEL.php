<?php
namespace MVC\Models;
use MVC\core\DB;
class POSTMODEL extends DB{
    public function GetAllposts(){
        $data=$this->select();
        return $data;
    }
    public function InsertNewPost($data){
        $All=$this->insert($data);
        return $All;
    }
    public function DeletePost($id){
        $this->delete($id);
    }
    public function GetPostByID($id){
        $PostData=$this->All("SELECT*FROM`post`WHERE`id`=$id");
return $PostData;

    }
    public function UpdatePost($data){
        $returnV=$this->update($data);
        return $returnV;
    }
}