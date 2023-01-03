<?php
namespace MVC\Controllers;
use MVC\core\Controller;
use MVC\core\Helpers;
use MVC\core\SESSION;
use MVC\Models\POSTMODEL;
use MVC\Models\CategoryModel;

use GUMP;
class POSTController extends Controller{
protected $object;
protected $CategoryObj;
    public function __construct(){
        $this->object=new POSTMODEL() ;
        $this->CategoryObj=new CategoryModel() ;
        SESSION::start();
        $userdata=SESSION::get('user');
        if(empty($userdata)){
exit('login frist please ');
            // Helpers::rediract('user/login');
        }

    }
    public function index(){
$data=$this->object->GetAllposts();
// \print_r($data);die;
        return $this->view('back/posts',['title'=>'AllPosts','data'=>$data]);
    }
    public function addPost(){
         $data=SESSION::get('user');
         $category=$this->CategoryObj->GetAllCategories();
        return $this->view('back/addnewpost',['title'=>'AddNewPost','user_id'=>$data[0]['id'],'categories'=>$category]);
    }
public function InsertNewPost(){
    $validate=GUMP::is_valid($_POST,[
        'title'=>'required',
        'description'=>'required',
    
    ]);
    if($validate==1){
        $imgName=$_FILES['img']['name'];
        $imgTmp=$_FILES['img']['tmp_name'];
        $imgtype=$_FILES['img']['type'];
        $imgsize=$_FILES['img']['size'];
        $title=$_POST['title'];
        $category=$_POST['category'];
        $user_id=$_POST['user_id'];
        $imgexe=\explode('.',$imgName);
        $description=$_POST['description'];
        $alowedexe=['jpg', 'png', 'svg', 'jpeg'];
        if(in_array($imgexe[1],$alowedexe)){
            $image = time() . "_" . $imgName;
            \move_uploaded_file($imgTmp,ROOT."public/imgesuploded/".$image);
            $files=['img'=>$image,'title'=>$title,'description'=>$description,'user_id'=>$user_id,'category'=>$category];
            $data=$this->object->InsertNewPost($files);
        Helpers::rediract('post/index');    
        }else{
            echo'<h3>img extention no suported</h3>';
            Helpers::rediract('post/addpost');
        }

    }else{
        foreach($validate as $valid)
        {
            echo "<ul class='btn btn-danger col-md-12' style='inlin-'>$valid<li></li></ul";          
        }
        return $this->view('back/addnewpost');
    


}

    
    
}
public function deletecategory($id){
    $this->object->DeletePost($id);
    Helpers::rediract('post/index');
}
public function updatePost($id){
    $PostData=$this->object->GetPostByID($id);
    $user=SESSION::get('user');

    // \print_r($PostData);die;
    $category=$this->CategoryObj->GetAllCategories();
return $this->view('back/updatapost',['data'=>$PostData,'title'=>'UpdatePost','categories'=>$category,'user_id'=>$user[0]['id']]);

}
public function DOupdatePost(){
$validate=GUMP::is_valid($_POST,[
    'title'=>'required',
    'description'=>'required']);
    if($validate==1){
        if(!empty($_FILES)){
            $imgName=$_FILES['img']['name'];
            $imgTmp=$_FILES['img']['tmp_name'];
            $imgtype=$_FILES['img']['type'];
            $imgsize=$_FILES['img']['size'];
            $title=$_POST['title'];
            $id=$_POST['id'];
            $category=$_POST['category'];
            $user_id=$_POST['user_id'];
            $imgexe=\explode('.',$imgName);
            $description=$_POST['description'];
            $alowedexe=['jpg', 'png', 'svg', 'jpeg'];
            if(in_array($imgexe[1],$alowedexe)){
                $image = time() . "_" . $imgName;
                move_uploaded_file($imgTmp,ROOT."public/imgesuploded/".$image);
                $files=['img'=>$image,'id'=>$id,'title'=>$title,'description'=>$description,'user_id'=>$user_id,'category'=>$category];
                $data=$this->object->UpdatePost($files);
            Helpers::rediract('post/index');    
            }else{
                echo'<h3>img extention no suported</h3>';
                Helpers::rediract('post/updatePost');
            }

        }else{
            $title=$_POST['title'];
            $category=$_POST['category'];
            $user_id=$_POST['user_id'];
            $description=$_POST['description'];
            $files=['title'=>$title,'id'=>$id,'description'=>$description,'user_id'=>$user_id,'category'=>$category];

        $data=$this->object->UpdatePost($files);
        Helpers::rediract('post/index');    

        }
    }else{
        foreach($validate as $valid)
        {
            echo "<ul class='btn btn-danger col-md-12' style='inlin-'>$valid<li></li></ul";          
        }
        return $this->view('back/updatePost');
    }

}
    
}
// move_uploaded_file($imgtmp,"../public/front/upload".$image);