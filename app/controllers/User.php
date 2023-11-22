<?php
class User extends Controller{
    public function __construct()
    {
        
    }
    public function signIn(){
        $this->view('user/signIn');
    }
    public function signUp(){
        $this->view('user/signUp');
    }
}