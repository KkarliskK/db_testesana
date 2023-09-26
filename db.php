<?php
class Database {
    private $host = "localhost"; 
    private $username = "root";
    private $password = ""; 
    private $database = "task_management"; 

    private $conn;

    // Constructor to establish the connection when the object is created
    public function __construct() {
        $this->conn = $this->connect();
    }

    // Function to establish the database connection
    private function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }

        return $conn;
    }
}

?>