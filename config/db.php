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

    public function getTaskManagementData() {
        $response = array();
    
        $sql = "SELECT * FROM tasks";
        $result = $this->conn->query($sql);
    
        if ($result) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $response[$i]['id'] = $row['id'];
                $response[$i]['title'] = $row['title'];
                $response[$i]['description'] = $row['description'];
                $response[$i]['due_date'] = $row['due_date'];
                $response[$i]['status'] = $row['status'];
                $response[$i]['created_at'] = $row['created_at'];
                $i++;
            }
            return json_encode($response, JSON_PRETTY_PRINT);
        } else {
            return json_encode(array("error" => "Query failed"));
        }
    }
}
?>