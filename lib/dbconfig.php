<?php
class DBConfig {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "map_db";
    private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
        
	}

    //connection with Mysql Database
	function connectDB() {
        try{
            $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
            return $conn;
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
		
	}

    //Fetch data from table
	function queryAll($query) {
        $result = mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }		
        if(!empty($resultset))
            return $resultset;
    }
    
    //Fetch number of rows
    function numRows($query) {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;	
    }

    //Insert/Updata data in database
    function execute($query) {
        $result  = mysqli_query($this->conn, $query);
        return $result;	
    }
}
?>
