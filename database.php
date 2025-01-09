<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "PBO";  
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function close() {
        $this->conn->close();
    }

    public function tampil_data() {
        $result = $this->conn->query("SELECT * FROM user");  

        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }

        $hasil = [];
        
        while ($row = $result->fetch_assoc()) {
            $hasil[] = $row;
        }

        return $hasil;  
    }

    public function get_user($id) {
        $query = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }
        
        $stmt->bind_param("i", $id);
        
        if (!$stmt->bind_param("i", $id)) {
            die("Bind param failed: " . $this->conn->error);
        }
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }

        return $result->fetch_assoc();
    }
    
    public function hapus_data($id) {
        $query = "DELETE FROM user WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
