<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $users = json_decode(file_get_contents('accounts.json'), true);
    $username= $_POST['username'];
    $password=$_POST['password'];
    foreach($users as $i){
        if($i['username']===$username && password_verify($password, $i['password'])){
            $_SESSION['username'] = $username;
            header('location: mainpage.php');
            exit;
        }
    }
    $check=1;


}?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/loginstyle.css">
</head>

<body>
    <header>
    <a href="signup.php" class="Signupbutton"> Signup </a>
    <a href="index.php" class="mainpage"> Main Page </a>
    </header>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <?php
        if (isset($check)) {
            echo '<div style="color: red; margin-bottom: 15px" >
                Invalid Username or password  
                </div>';
        }
        ?>

        <button type="submit">Login</button>

    </form>
</body>

</html>