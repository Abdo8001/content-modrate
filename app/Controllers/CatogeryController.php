<?php
namespace MVC\Controllers;
use MVC\core\DB;
use MVC\core\Controller;
use MVC\Models\CategoryModel;
use MVC\core\Helpers;
class CatogeryController extends Controller{
    protected $object;
    public function __construct(){
        $this->object=new CategoryModel();

    }

    public function index(){
        $data=$this->object->GetAllCategories();
        // \print_r($data);die;
return $this->view('back/AllCategoreis',['title'=>'all categeiors','data'=>$data]);


    }
    public function AddNewCategory(){
        return $this->view('back/addCategory',['title'=>'addNewCategory']);
    }
    public function AddCatogryLogic(){
$CategoryName=$_POST['name'];
if(isset($_POST['submit'])){
    $data[]['name']=$CategoryName;
    $this->object->insertNewCategory(['name'=>$CategoryName]);
    return Helpers::rediract('catogery/index');
}else{
    return $this->view('back/addCategory',['category'=>'not added at all']);

}
    }
    public function deleteCategory($id){
    
        $this->object->DeleteCategory($id);
        return Helpers::rediract('catogery/index');

   }
public function UpdateCategory($id){
    $data=$this->object->GetCategoryByid($id);
    //  $Categoryname= $data[0]['name'];
    // $d=$data['name'];
    $action=Helpers::Url('catogery/UpdateCatogryLogic');
    return $this->view('back/updateCategory',['name'=>$data,'action'=>$action,'title'=>'updateCategory']);


}
public function UpdateCatogryLogic(){
    // $CategoryName=$_POST['name'];

    $name=$_POST['name'];
    $id=$_POST['id'];
    //   $arr=implode("",$id);
    // echo gettype($arr);die;
    $data[]=['id'=>$id,'name'=>$name];
    // print_r($data);die;
$all=$this->object->UpdateCatogry($_POST);
if(!empty($all)){
    return Helpers::rediract('catogery/index');
}else{
    return 'mooooo';
}


}


}