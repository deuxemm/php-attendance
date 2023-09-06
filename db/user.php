<?php

class user{
        // private database object
        private $db;

        // constructor to initialise private variable to the databse connection
        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertUser($username, $password){
            try {
                $result = $this->getUserbyUsername($username);
                if($result['num'] > 0 ){
                    return false;
                } else{
                    $new_password = md5($password.$username);
                    // define sql statement to be executed
                    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                    // prepare sql statement for execution
                    $stmt = $this->db->prepare($sql);
                    // bind all placeholders to the actual values (PDO methodology)
                    $stmt->bindparam(':username', $username);
                    $stmt->bindparam(':password', $new_password);
                    
                    // Execute statement 
                    $stmt->execute();
                    return true;
                }
    
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($username, $password){
            try {
                $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
    
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // so that we don't enter two users with the same usersname
        public function getUserbyUsername($username){
            try {
                $sql = "SELECT count(*) as num  FROM users WHERE username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);

                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
    
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

}

?>