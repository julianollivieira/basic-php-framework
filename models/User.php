<?php
class User {

    public string $id;
    public string $username;
    public string $password;
    public string $email;
    public bool $active;

    public Database $db;

    public function __construct(){
        $this->db = new Database();
    }
}