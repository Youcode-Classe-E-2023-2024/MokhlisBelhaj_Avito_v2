<?php
class Posts extends Controller{
    protected $postModel;
    protected $userModel;
    public function __construct(){
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('userModel');
       
    }
    public function index(){
    $data = [
        'title' => 'Posts',
    ];

    $this->view('posts/index',$data);
}
public function show($id){
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){  
        $post=$this->postModel->getpost();
        $idUser = $post[0]->user_id;
    $user=$this->userModel->getUserByID($idUser);
        $data=[
          'post'=>$post,
          'user'=>$user
        ];   
    $this->view('posts/show',$data);
    }
}
}