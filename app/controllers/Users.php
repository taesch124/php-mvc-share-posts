<?php

class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        //Check if GET or POST
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            //Init data
            $data = [
                'title' => 'Register',
                'name' => '',
                'email' => '',
                'password' => '',
                'password_confirm' => '',
                'errors' => [],
            ];

            //Load view
            $this->view('users/register', $data);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form
            //Sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'title' => 'Register',
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'password_confirm' => trim($_POST['password_confirm']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'password_confirm_error' => '',
                'errors' => [],
            ];

            //Validate data
            if(empty($data['name'])) {
                $data['errors']['name'] = 'Name cannot be blank'; 
            }

            if(empty($data['email'])) {
                $data['errors']['email'] = 'Email cannot be blank'; 
            } else if (!empty($this->userModel->getUserByEmail($data['email']))) {
                $data['errors']['email'] = 'This email has already been taken.';
            }

            if(empty($data['password'])) {
                $data['errors']['password'] = 'Password cannot be blank'; 
            } else  if (strlen($data['password']) < 6) {
                $data['errors']['password'] = 'Password must be at least 6 characters'; 
            }

            if(empty($data['password_confirm'])) {
                $data['errors']['password confirm'] = 'Please confirm your password'; 
            } else if ($data['password'] !== $data['password_confirm']) {
                $data['errors']['password confirm'] = 'Passwords do not match'; 
            }

            if(empty($data['errors'])) {
                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                //Use model to add to database
                if($this->userModel->register($data)) {
                    flash('register_success', 'You are now registered.');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }

        }
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            //Init data
            $data = [
                'title' => 'Login',
                'email' => '',
                'password' => '',
                'errors' => [],
            ];

            //Load view
            $this->view('users/login', $data);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form
            //Sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'title' => 'Login',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'errors' => [],
            ];

            if(empty($data['email'])) {
                $data['errors']['email'] = 'Email cannot be blank'; 
            } 

            if(empty($data['password'])) {
                $data['errors']['password'] = 'Password cannot be blank'; 
            } else  if (strlen($data['password']) < 6) {
                $data['errors']['password'] = 'Password must be at least 6 characters'; 
            }

            if(empty($this->userModel->getUserByEmail($data['email']))) {
                $data['errors']['email'] = 'No user found';
                
            }

            if(empty($data['errors'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser) {
                    //Create session variables
                    $this->createUserSession($loggedInUser);
                }
                else {
                    $data['errors']['password'] = "Password incorrect";
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }

        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts');
    }
}