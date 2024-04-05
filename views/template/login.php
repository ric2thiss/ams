<?php
    // Include the AuthController class file
    include '../../controller/AuthController.php';

    // Include the UserModel class file
    include '../../model/UserModel.php'; // You may need to adjust the path

    // Instantiate the UserModel (assuming it also requires a database connection)
    $dbConnection = new PDO("mysql:host=localhost;dbname=announcement_management_system", "root", "");
    $userModel = new UserModel($dbConnection); // Adjust this instantiation according to your UserModel class constructor

    // Instantiate the AuthController with the UserModel instance
    $authController = new AuthController($userModel);

    if(!empty($_POST["username"]) && !empty( $_POST['password'] )) {
        // Calling login method of AuthController
        $authController->login();


    }

?>

<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <button type="submit">Login</button>
</form>
