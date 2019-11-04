<?php

class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
        if(!isLoggedIn()) {
            redirect('users/login');
        }
    }

    public function index() {
        $posts = $this->postModel->getPosts();

        $data = [
            'title' => 'Posts',
            'posts' => $posts,
        ];

        $this->view('posts/index', $data);
    }
}