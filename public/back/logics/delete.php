<?php
session_start();
require_once'../core/dbconnct.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="delete from `portfolio`where `id`='$id';";
    $res=mysqli_query($conct,$query);
    $_SESSION['success']='portfilio deleted sucessfully';
    header("location:../../showport.php");
}else{
    header("location:../../showport.php");

}