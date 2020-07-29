<?php

class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // !Process form

            // !Sanitize Input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // !Validate Name

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            // !Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }else {
                // Check email
                if($this->userModel->findUserByEmail($data['email'])){
                  $data['email_err'] = 'Email is already taken';
                }
              }
            // !Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be greater that 6 characters'; 
            }
            // !Validate conform password
            if ($data['confirm_password'] != $data['password']) {
                $data['confirm_password_err'] = 'Password does not match';
                $data['password_err'] = 'Password does not match';
            }
            // !Check if all errors are empty
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // !Validated
                // !Hash 
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->findUserByEmail($data)) {
                    echo "email exists";
                }
                // !Register User


                if ($this->userModel->register($data)) {
                    flash('register_success', 'You Are Registered And Can Now Login!');
                    redirect('users/login');
                }else{
                    die("There Was An Error Signing You Up, Please Try Again Later. ");
                }
            }else{
                // !Load views with errors
                $this->view('users/register', $data);
            }

        }else{
           $data =[
               'name' => '',
               'email' => '',
               'password' => '',
               'confirm_password' => '',
               'name_err' => '',
               'email_err' => '',
               'password_err' => '',
               'confirm_password_err' => ''
           ];
           $this->view('users/register', $data);
        }
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // !Process form
            // !Sanitize Input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_err' => '',
                'password_err' => ''
            ];

            // !Validation
            // !Check Email
            if (empty($data['email'])) {
               $data['email_err'] = 'Please Enter Email';
            }
            // !Check Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please Enter Password';
            }
            // !Check For User/email
            if($this->userModel->findUserByEmail($data['email'])){
                // !User Found
              }else{
                // !No User Found
                $data['email_err'] = 'No User Found';
              }
            // !Check if all errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                // !Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // !Create Session
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            }else{
                $this->view('users/login', $data);
            }
        } else {
            $data =[
               'email' => '',
               'password' => '',
               'email_err' => '',
               'password_err' => ''
           ];
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    
}