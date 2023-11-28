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
  
  $post=$this->postModel->getpost();

  $data=[
    'post'=>$post
  ];
      $this->view('dashbaord/index',$data);
    }
}