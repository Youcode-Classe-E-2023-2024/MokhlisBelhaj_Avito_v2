<?php
class User extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }
    public function signIn()
    {
        $data = [
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'email_err' => '',
            'password_err' => '',
        ];
        $this->view('user/signIn',$data);
    }
    public function signUp()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //sanitiza post data 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Pleae enter email';
            }else {
                // check email 
                if($this->userModel->FindUserByEmail($data['email'])){
                    $data['email_err'] = 'email is already taken';
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter name';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Pleae enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Pleae confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated
                // hash password 
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // signUp model method
                if($this->userModel->signUp($data)){

                }else{
                    die('samting went wrong');
                }
            } else {
                // Load view with errors
                $this->view('user/signUp', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('user/signUp', $data);
        }
    }
}
