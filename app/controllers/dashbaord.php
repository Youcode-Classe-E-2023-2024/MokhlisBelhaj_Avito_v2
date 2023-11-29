<?php
class Dashbaord extends Controller{
  protected $postModel;
  protected $userModel;
  public function __construct(){
    if(!isLoggedIn()){
      redirect('user/signIn');
    }
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('UserModel');
        
    }
 public function index(){
  if($_SESSION['role']){
  $post=$this->postModel->getpost();
  $user=$this->userModel->getUser();
  $data=[
    'post'=>$post,
    'user'=>$user
  ];
  }else{
    $id = $_SESSION['user_id'];
    $post=$this->postModel->getpostByUserId($id);
    $data=[
      'post'=>$post
    ];
  }


 
      $this->view('dashbaord/index',$data);
    }
}