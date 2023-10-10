<?php
class Database {
    private $host = "localhost"; 
    private $username = "root";
    private $password = ""; 
    private $database = "task_management_kb"; 
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

    public function getTaskById($id) {
        $sql = "SELECT * FROM tasks WHERE id=$id";
        $params = [$id];
        return $this->selectOne($sql, $params);
    }

    public function editTask($id, $newTitle, $newDescription, $newDueDate) {
        // Escape and quote the values to prevent SQL injection
        $newTitle = $this->conn->real_escape_string($newTitle);
        $newDescription = $this->conn->real_escape_string($newDescription);
        $newDueDate = $this->conn->real_escape_string($newDueDate);
    
        // Construct the SQL query with interpolated values
        $sql = "UPDATE tasks SET title='$newTitle', description='$newDescription', due_date='$newDueDate' WHERE id=$id";
    
        // Execute the SQL query
        $result = $this->conn->query($sql);
    
        return $result !== false;
    }
    
    function insert($sql)
    {
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function delete($sql)
    {
    if ($this->conn->query($sql)) {
        return true; // Delete operation successful
    } else {
        return false; // Delete operation failed
    }
    }

    function select($sql)
    {
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function selectOne($sql)
    {
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
}
?>