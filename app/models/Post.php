<?php

class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query('SELECT 
        p.id AS post_id,
        u.id AS user_id,
        p.title,
        p.text,
        p.created_at,
        u.name 
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        ORDER BY p.created_at DESC;'
        );

        return $this->db->resultSet();
    }

    public function getPost($id) {
        $this->db->query('SELECT 
        p.id AS post_id,
        u.id AS user_id,
        p.title,
        p.text,
        p.edited,
        p.created_at,
        u.name 
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        WHERE p.id = :id
        ORDER BY p.created_at DESC;'
        );
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->getOne();
    }

    public function addPost($data) {
        $this->db->query('INSERT INTO posts (user_id, title, text)
        VALUES(:user_id, :title, :body)');
        $this->db->bind(':user_id', $data['user_id'], PDO::PARAM_INT);
        $this->db->bind(':title', $data['title'], PDO::PARAM_STR);
        $this->db->bind(':body', $data['body'], PDO::PARAM_STR);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editPost($data) {
        $this->db->query('UPDATE posts
        SET title = :title,
        text = :body,
        edited = :edit_count
        WHERE id = :post_id');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':edit_count', $data['edit_count']);
        $this->db->bind(':post_id', $data['post_id']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($id) {
        $this->db->query('DELETE FROM posts
        WHERE id = :id;');
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        if($this->db->execute()) {
            return true;
        } else return false;
    }
}