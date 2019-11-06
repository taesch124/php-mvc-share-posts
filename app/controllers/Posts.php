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

    public function add() {
        $data = [
            'title' => 'Add Post',
            'post' => [
                'title' => '',
                'body' => '',
            ],
            'errors' => [],
        ];

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view('posts/add', $data);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data['post'] = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
            ];

            if(empty($data['post']['title'])) {
                $data['errors']['title'] = 'Title cannot be blank';
            }

            if(empty($data['post']['body'])) {
                $data['errors']['body'] = 'Body cannot be blank';
            }

            if(empty($_SESSION['user_id'])) {
                $data['errors']['user'] = 'Must be logged in to create post.';
            } else {
                $data['post']['user_id'] = $_SESSION['user_id'];
            }

            if(empty($data['errors'])) {
                if($this->postModel->addPost($data['post'])) {
                    flash('post_created', 'Your post has been created.');
                    redirect('posts');
                } else {
                    die('Something went wrong.');
                }
                
            } else {
                $this->view('posts/add', $data);
            }
        }
    }

    public function edit($id) {
        $post = $this->postModel->getPost($id);
        $data = [
            'title' => 'Edit Post',
            'post' => [
                'post_id' => $post->post_id,
                'user_id' => $post->user_id,
                'title' => $post->title,
                'body' => $post->text,
                'name' => $post->name,
                'created_at' => $post->created_at,
            ],
        ];

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $this->view('posts/edit', $data);
        } else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
        }

    }

    public function detail($id) {
        $post = $this->postModel->getPost($id);
        $data = [
            'title' => 'Post',
            'post' => [
                'post_id' => $post->post_id,
                'user_id' => $post->user_id,
                'title' => $post->title,
                'body' => $post->text,
                'name' => $post->name,
                'created_at' => $post->created_at,
            ],
        ];

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $this->view('posts/detail', $data);
        }
    }
}