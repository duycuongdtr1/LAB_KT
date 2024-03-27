<?php
class Db {
    protected static $connection;
    public $conn; 

    public function connect() {
        if (!isset(self::$connection)) {
            $config = parse_ini_file("config.ini");
            $this->conn = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]); // Sử dụng $this->conn

            if ($this->conn->connect_error) {
                die("Kết nối cơ sở dữ liệu thất bại: " . $this->conn->connect_error);
            }

            self::$connection = $this->conn; 
        }
        return self::$connection;
    }
    public function __construct() {
        $this->connect();
    }
    

    public function query_execute($queryString) {
        $connection = $this->connect();
        $result = $connection->query($queryString);
        return $result;
    }

    public function select_to_array($queryString) {
        $rows = array();
        $result = $this->query_execute($queryString);

        if ($result === false) {
            return false;
        }

        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }


        return $rows;
    }
}
?>
