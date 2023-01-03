<?php
require_once'../core/dbconnct.php';
session_start();
if(isset($_POST['submit'])){
$description=trim(htmlentities(htmlspecialchars($_POST['desc'])));
$imgname=$_FILES['img']['name'];
$imgtyp=$_FILES['img']['type'];
$imgtmp=$_FILES['img']['tmp_name'];
$imgsize=$_FILES['img']['size'];
$errors=[];
$user=$_SESSION['user']['id'];
$alowedexe=['jpg', 'png', 'svg', 'jpeg'];
$explode=explode('.',$imgname);
$imgextn=strtolower(end($explode));
if(empty($imgname)) $errors[] = "Product Image is required";
if(!in_array($imgextn, $alowedexe)) $errors[] = "This Extension isn't allowed";
if($imgsize > 2097152) $errors[] = "Image size should be less than 2MB";

if(empty($errors)){
    $image = time() . "_" . $imgname;
   move_uploaded_file($imgtmp,"../uploded/".$image);
$sql=new mysqli('localhost','root','','projects');
$res=$sql->query("INSERT INTO`portfolio` (`description`,`img`,`user_id`)VALUES('$description','$image','$user');");

   // $query="INSERT INTO`portfolio` (`description`,`img`,`user_id`)VALUES('$description','$image','$user');";
// $res=mysqli_query($conct,$query);
$_SESSION['success']="portfilio added successfully";
       header("location:../../portfilio.php");
exit;

}else {
    $_SESSION['errors'] = $errors;
    header("Location:../../portfilio.php");
    exit;
}
}