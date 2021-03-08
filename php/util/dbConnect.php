<?php

final class DBConnect {
    /**
     * 
     * @return PDO : Represents the connection with the database.
     */
    static public function connect() : PDO {
        require "dbConfig.php";
        
        try {
            $conn = new PDO("mysql:host=$SERVER_NAME;dbname=$DB_NAME", $USER_NAME, $PASSWORD);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    /**
     * 
     * @param PDO $conn     : The PDO connection used to send the query.
     * @param string $query : The query (e.g. "SELECT * FROM table1").
     * @throws PDOException : Thrown if there is a problem with sending the query.
     * @return PDOStatement : An object describing the query result.
     */
    static public function getData(PDO $conn, string $query) : PDOStatement {
        try {
            $result = $conn->query($query);
            return $result;
        }
        
        catch(PDOException $e) {
            echo $e->getMessage();
            throw $e;
        }
    }
}
?>
