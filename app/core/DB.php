<?php
namespace MVC\core;
use PDO;
class DB{
    protected $connction;
    protected $statement ;//will contain all pdo and sql errors
    protected $table;
    public function __construct(){
        $this->get_class_name();
        $this->conction_to_databse();
    }
    //get the table name dynamiclly 
private function get_class_name(){
    $table=explode("\\",static::class);
    $table=end($table);
    
   return  $this->table=substr($table,0,-5);


}
//connction to database
    private function conction_to_databse(){
try {
    $this->connction=new PDO(DSN,DB_USER,DB_PASS);
    $this->connction->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $exception){
    print "Connection failed: " . $exception->getMessage();
    die();
}


    }
    // Prepares a statement for execution and returns a statement object.

    private function prepare($query){
        $this->statement=$this->connction->prepare($query);
    }
    
    // handle PDO errors Method.
    private function handle_sql_errors($query, $error_message)
    {
        echo '<pre>';
        echo  '<strong style="color: red;">SQL Query: </strong>'.$query;
        echo '</pre>';
        echo '<strong style="color: red;">Error Message: </strong>'.$error_message;
        die;
    }

private function excute($data){
    if($this->statement->execute($data)){
        return true;
        return false;
    }
}


private function check_array_value($array)
    {

        foreach ($array as $k => $v)
        {
            if(!is_numeric($v) && !intval($v) == $v)
            {
                $v = "'$v'";
            }
        }
        return $array;
    }
        // Return the number of affected rows via that method [ Like That mysqli_affected_rows ].
private function row_count(){
    return $this->statement->rowCount();
}

    // Return the number of rows in a result set. [ Like That mysqli_num_rows ].
private function NumRows(){
    return $this->statement->fetchColumn();
}

    // Insert Data To Database Table.
protected function insert($data){
$fields='';
$values='';
foreach($data as $key=>$value){
    $fields.="`$key`,";
    $values.=":$key,";
}
//remove last coma from query
$fields=substr($fields,0,-1);
//remove last coma from values
$values=substr($values,0,-1);
// \print_r($fields);die;

$query="INSERT into`$this->table`($fields)VALUES($values)";

try {
$this->prepare($query);

if($this->excute($data)){
return true ;
return false;
}
} catch (PDOException $exception) {
    $this->handle_sql_errors($query,$exception->getMessage());

}
}

protected function update($data){
$query='';
foreach($data as $key=>$value){
    $query.="`$key`=:$key,";
}
        // remove last Comma , in This Variable.

$query=substr($query,0,-1);
 // update query syntax:
        // UPDATE `table_name` SET `column_1` = ':value_1', `column_1` = ':value_2' WHERE some_column=some_value
$sql_query="UPDATE`$this->table` SET $query WHERE `$this->table`.`id`=:id";
try {
    // $data["id"] = $id;

$this->prepare($sql_query);
if($this->excute($data)){
    return true;
    return false;
}
}  catch (PDOException $exception)
{
    $this->handle_sql_errors($queryString,$exception->getMessage());
}
}

protected function delete($id){

    try {
        $query="DELETE FROM `$this->table`WHERE `$this->table`.`id`=:id";
        $data=['id'=>$id];
        $this->prepare($query);
        $result=$this->excute($data);
        if($result&&$this->row_count()>0){
            return true;
            return false;
        }
    } catch (PDOException $exception) {
        $this->handle_sql_errors($query,$exception->getMassage());
    }
    
}
protected function select(){
    $sql="SELECT*FROM`$this->table`";
    
   $tell=$this->connction->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//    $tell->fetchAll(PDO::FETCH_ASSOC);

return $tell;
}
 // Select Data From Database Table.
 protected function All($query)
 {

     try
     {

     $statement   = $this->connction->query($query);
     $result      = $statement->fetchAll(PDO::FETCH_ASSOC);

     if(count($result)>0)

         return $result;

     return null;

     }

     catch (PDOException $exception)
     {
        $this->handle_sql_errors($query,$exception->getMessage());
     }


 }


 protected function select_count($extra='')
 {
     return $this->connection->query("SELECT COUNT(*) FROM `$this->table` $extra")->fetchColumn();
 }


 // close Database connection
 public function __destruct()
 {
     $this->connection = null;
     
 }

















}
