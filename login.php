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
            header('location: portofolio.php');
            exit;
        }
    }
    $check=1;


}?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: "Georgia", sans-serif;
            background-image: url('images/back.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 15px;
            max-width: 300px; 
            width: 100%;
            box-sizing: border-box;
        }
        label {
            margin-bottom: 8px;
            color: white;
            font-weight: bold;
            text-align: left; 
            width: 100%; 
            box-sizing: border-box;
        }

        input {
            padding: 8px;
            margin-bottom: 12px;
            width: 100%; 
            box-sizing: border-box;
            border: 2px solid #3c72ac;
            border-radius: 8px;
        }
        input:hover{
            transform: scale(1.1);
        }
        

       

        

        button {
            background: #3c72ac;
            border-radius: 10px;
            
            color: white;
            font-size: 20px;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            outline: none;
            border: none;
            margin-bottom: 10px; 
        }

        button:hover {
            background: #76b8ff;
            transform: scale(1.1);
        }
        .mainpage{
    font-family:  "Georgoa", sans-serif;
    padding: 10px 20px;
            background-color: #3c72ac;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            cursor: pointer;
            position: fixed; /* Fixed position to keep it in the viewport */
            top: 0; /* Position from the top */
            right: 0; /* Position from the right */
            margin: 20px;
}
       

.Signupbutton {
            font-family:  "Georgoa", sans-serif;
            
            padding: 10px 20px;
            background-color: #3c72ac;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            cursor: pointer;
            position: fixed; /* Fixed position to keep it in the viewport */
            top: 0; /* Position from the top */
            left: 0; /* Position from the left */
            margin: 20px; /* Optional margin for spacing */
            
}
.Signupbutton:hover,.mainpage:hover{
            background: #76b8ff;
            transform: scale(1.1);
        }

        
    </style>
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