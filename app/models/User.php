<?php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUsers() {
        $this->db->query('SELECT * FROM users;');

        return $this->db->resultSet();
    }

    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind('id', $id, PDO::PARAM_INT);

        return $this->db->getOne();
    }

    public function getUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind('email', $email, PDO::PARAM_STR);

        return $this->db->getOne();
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind('name', $data['name'], PDO::PARAM_STR);
        $this->db->bind('email', $data['email'], PDO::PARAM_STR);
        $this->db->bind('password', $data['password'], PDO::PARAM_STR);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email, PDO::PARAM_STR);

        $row = $this->db->getOne();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
}