<?php
class Database {

    public ?PDO $conn;

    public function __construct() {
        try {
            $this->conn = new PDO();
            $this->conn->setAttribute();
        } catch(PDOException $e) {

        }
    }

}