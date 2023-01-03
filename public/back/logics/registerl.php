<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<?php
session_start();

require_once '../core/dbconnct.php';
if(isset($_POST['submit'])){
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['Password'];
    $errors=[];
  

if(empty($name)){
    $errors[]='name is required';
}if (strlen($name)<3) {
    $errors[]='name must be more than 3 letters';
}
if(empty($email)){
    $errors[]='email is rquierd';
    
}
if(empty($password)){
    $errors[]='password is rquierd';

}

if(empty($errors)){
    $query="INSERT INTO `users`(`name`, `email`,`paswword`) VALUES('$name','$email','$password');";
    $reslut=mysqli_query($conct,$query);
    $rowas=mysqli_affected_rows($conct);
   
    if($rowas>=1) {
        $_SESSION['success'] = "u been registerd";
        header("Location:../../../dashbord/login.php" );
        exit;
    }
exit;
}else{
    $_SESSION['errors']=$errors;
    header('location:../../../dashbord/register.php');
    exit;
    // foreach($errors as $error){
    //     echo "<li class='ist-group-item bg-primary'>".$error."</li>"; 
      
       

    // }
}


}