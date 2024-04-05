<h1>User Profile</h1>
    <h2>Username:</h2>
    <ul>
        <?php
            if ($userInfo) {
                $username = $userInfo['firstname'];
                // Now you have the username of the logged-in user
                echo  "<li>$username</li>";
            } else {
                // Handle error if user information couldn't be retrieved
            }
        ?>
    </ul>