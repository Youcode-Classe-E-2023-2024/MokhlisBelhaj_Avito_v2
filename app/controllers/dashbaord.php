<?php
class Dashbaord extends Controller{
  protected $postModel;
  public function __construct(){
    if(!isLoggedIn()){
      redirect('user/signIn');
    }
      $this->postModel = $this->model('Post');
        
    }
 public function index(){
  if($_SESSION['role']){
  $post=$this->postModel->getpost();
  }else{
    $id = $_SESSION['user_id'];
    $post=$this->postModel->getpostByUserId($id);
  }


  $data=[
    'post'=>$post
  ];
      $this->view('dashbaord/index',$data);
    }
}