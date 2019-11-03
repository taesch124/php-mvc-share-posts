<?php

class Users extends Controller {
    public function __construct() {

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
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'password_confirm_error' => '',
            ];

            //Load view
            $this->view('users/register', $data);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        }
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            //Init data
            $data = [
                'title' => 'Login',
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => '',
            ];

            //Load view
            $this->view('users/login', $data);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
        }
    }
}