<?php
include 'Database.php';
    class UserModel{
        private $conn;

        public function __construct(){
           $database = new Database();
           $this->conn = $database->getConnection();
        }

        // Getter sa username after login or any other credentials
        public function getUser($id) {
            try {
                $sql = "SELECT username,firstname FROM users WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $err) {
                echo $err->getMessage();
                return null; // Return null if an error occurs
            }
        }        


        // Login
        public function  loginUser($username, $password) {
            try{
                $sql = "SELECT * FROM users WHERE username = :username AND password = :password";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam( ":username", $username );
                $stmt->bindParam( ":password", $password );
                // $stmt->bindParam(":status","1");
                $stmt->execute();
    
    
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if($user){
                    return $user;
                }else{
                    echo  "Error";
                }
            }catch(PDOException $err){
                echo $err->getMessage();
            }
        }

       // Create a new USER
        public function createUser(string $Fname, string $middlename, string $Lname, string $email, string $username, string $password){
            try{
                $sql = "INSERT INTO Register(`firstname`, `lastname`, `middlename`, `email`, `username`, `password`) VALUES(:fname, :lname, :middlename, :email, :username, :password)";
                
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':fname', $Fname);
                $stmt->bindParam(':lname', $Lname);
                $stmt->bindParam(':middlename', $middlename);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);

                $stmt->execute();
                
            } catch(PDOException $err){
                echo $err->getMessage();
            }
        }

    }
?>