<?php
    class AuthController{
        private $userModel;

        public function __construct($userModel)
        {
            $this->userModel = $userModel;
        }

        public function login(){
            if($_SERVER["REQUEST_METHOD"]== "POST"){
                $username = $_POST["username"];
                $password = $_POST["password"];


                $user = $this->userModel->loginUser($username, $password);

                if($user){
                    // If success
                    header('Location: ../../controller/UserController.php');
                    exit;
                } else {
                    // Authentication failed, display error message
                    echo 'Invalid username or password';
                }
            }
        }
    }
?>