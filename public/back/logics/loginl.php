<?php
require_once'../core/dbconnct.php';
// require_once'../core/config.php';

session_start();
// function login($email,$password){
//     $localhost='localhost';
// $name='root';
// $password1='';
// $dbname='projects';
// $conct=mysqli_connect($localhost,$name,$password1,$dbname);
//     // require_once'../core/dbconnct.php';

// $qurey="SELECT*FROM`users` where `email`='$email'and `paswword`='$password';";
// $q=mysqli_query($conct,$qurey);
// $res=mysqli_fetch_assoc($q);
// return $res;
// }
// if(isset($_POST['email'])){
//     $email=$_POST['email'];
//     $password=$_POST['password'];
//    $res=login($email,$password);
//     if(isset($res)){
//         echo"dddd"  ;

//       header('location:../../../dashbord/home.php');
//     }
  
//   }
//   else{
//     $_SESSION['errors']="must be valid name or pass";
//     header('location:../../../../register.php');
  
//   }

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name=htmlentities(htmlspecialchars(trim($_POST['email'])));
      $password=htmlentities(htmlspecialchars(trim($_POST['password'])));
    //   $_SESSION['email']=$name;
    //   $_SESSION['password']=$password;
    $arrs=[];

   
   $sql= "SELECT * FROM users WHERE email = '$name' AND paswword = '$password' ";
   $result = mysqli_query($conct,$sql);
   $check = mysqli_fetch_assoc($result);
   if(isset($check)){
   $_SESSION['user']=$check;
       header("location:../../home.php");
exit;
   
   }else{
    header("location:../../login.php");
$arrs[]='valid email or password';
   
 $_SESSION['errors']=$arrs;
   }
   }














