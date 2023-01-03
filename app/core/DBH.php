<?php
namespace MVC\core;
use MVC\core\dbhandler;
use PDO;

class DBH implements dbhandler{
    protected $connction;
    public $table;
    public function __construct(){

        $this->connction=new PDO(DSN,DB_USER,DB_PASS);
    $this->Get_classname();
    }

// private function start_connct(){
//     try {
//     $this->connction=new PDO(DSN,DB_USER,DB_PSS);
//         $this->connction->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//     } catch (PDOException $exception) {
//         print "Connection failed: " . $exception->getMessage();
//           die();
//     }
// }
public function insert($data){
   
    $sql="INSERT INTO `$this->table`(";
   //coulmos
    foreach($data as $key=>$vary){
        $sql.="`$key`,";
    }
    $sql=rtrim($sql,',');
    //values
    $sql.=")VALUES(";
    foreach($data as $key=>$vary){
        $sql.=":$key,";

    }
    $sql=rtrim($sql,',');
    $sql.=")";
    // echo $sql;die;
    print_r($data);
    $stm=$this->connction->prepare("$sql");
    $stm->execute($data);
}
public function update($data){
    $sql="UPDATE `$this->table`SET";
    foreach($data as $key=>$value){
        if($key!='id'){
            $sql.="`$key`=:$key ,";
        }
    } 
    $sql=rtrim($sql,',');
    foreach($data as $key=>$value){
        if($key=='id'){
            $sql.="WHERE `$key` =:$key ";
        }

    }
    // echo $sql;die;
    // $stm=$this->connction->prepare($sql);
    // $stm->execute($data);
     $this->exefun($sql,$data);

}
    public function delete($id){
        $sql="DELETE from `$this->table` WHERE `id`=:id";
        $data=['id'=>$id];
        $this->exefun($sql,$id);

    }
    public function select(){
        $sql="SELECT*FROM`$this->table`";
        
       $tell=$this->connction->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    //    $tell->fetchAll(PDO::FETCH_ASSOC);

return $tell;
    }

    private function exefun($sql,$data){
        // echo $sql;
        // \print_r($data);die;
        $stm=$this->connction->prepare("$sql");
      $stm->execute($data);
    }
public function Get_classname(){
    $table=explode('\\',static::class);
    $class_name=$table[2];
$this->table=trim($class_name,'MODEL');
return $this->table;
}
}
