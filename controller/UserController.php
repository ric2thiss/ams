<?php
      include '../model/UserModel.php'; // Include UserModel class

    // Instantiate UserModel (assuming $dbConnection is your database connection)
    $dbConnection = new PDO("mysql:host=localhost;dbname=announcement_management_system", "root", "");
    $userModel = new UserModel($dbConnection);
    
    // Call getUsernames method to fetch usernames
    // $username = $userModel->getUser(1, "Ric Charles");

    $userInfo = $userModel->getUser(1);

    
    // Pass usernames to the view for display
    include '../views/dashboard.php';


?>

