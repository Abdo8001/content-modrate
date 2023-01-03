<?php
session_start();
require_once '../core/dbconnct.php';
if(isset($_POST['submit'])){
$description=trim(htmlentities(htmlspecialchars($_POST['desc'])));
$imgname=$_FILES['img']['name'];
$imgtmp=$_FILES['img']['tmp_name'];
$imgsize=$_FILES['img']['size'];
$id=$_POST['id'];
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
   $query="update `portfolio`set `description`='$description',`img`='$image',`user_id`='$user'where `id`='$id'";
   $result=mysqli_query($conct,$query);
$_SESSION['success']="portfilio updated successfully";
       header("location:../../showport.php");
exit;

}else {
    $_SESSION['errors'] = $errors;
    header("Location:editp.php");
    exit;
}
}
