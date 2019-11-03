<?php

class Post {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getPosts() {
        $this->db->query('SELECT 
        p.title,
        p.text,
        p.created_at,
        u.name 
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id;'
    );

        return $this->db->resultSet();
    }
}