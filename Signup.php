<!DOCTYPE html>
<html lang="en">
<?php
    function isStrongPassword($password) {
        if (strlen($password) < 8) {
            return false;
        }
    
        if (!preg_match('@[A-Z]@', $password)) {
            return false;
        }
    
        if (!preg_match('@[a-z]@', $password)) {
            return false;
        }
    
        if (!preg_match('@[0-9]@', $password)) {
            return false;
        }
    
        if (!preg_match('@[!#$%^&*(),.?":{}|_<>]@', $password)) {
            return false;
        }
    
        return true;
    }

    $passer="";
    $usrer="";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $users = json_decode(file_get_contents('accounts.json'), true);
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sex=$_POST['sex'];
        $date=$_POST['date'];

        foreach($users as $i){
            if($i['username']==$username){
                $usrer="An account with this username already exists, please choose another username";
                break;
            }
        }


        if(!isStrongPassword($password)){
            $passer="The password should be at least 8 charecters long and contains at least 1 upper case, lower case, number and special symbol";
        }
        else{
            $encryptedpass=password_hash($password, PASSWORD_BCRYPT);
        }
        if(empty($passer) && empty($usrer)){
            $user = [
                'username' => $username,
                'full_name' => $name,
                'password' => $encryptedpass,
                'sex' => $sex,
                'dob' => $date,
            ];
            $users[] = $user;
            file_put_contents('accounts.json', json_encode($users));
            header('Location: login.php');
            exit;
        }
        


    }

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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

        h1 {
            color: #40a474;
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

        input,
        select {
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
        select:hover{
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

        .login {
            font-size: 14px;
            color: #76b8ff;
            text-decoration: none;
            cursor: pointer;
            margin-bottom: 5px;
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
       

.loginbutton {
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
.loginbutton:hover,.mainpage:hover{
            background: #76b8ff;
            transform: scale(1.1);
        }
    </style>

    <script>
        function validatePassword() {
            var password = document.getElementById('password').value;
            return checkPasswordStrength(password);
        }
    </script>
</head>

<body>
    <header>
    <a href="login.php" class="loginbutton"> Login </a>
    <a href="index.php" class="mainpage"> Main Page </a>
    </header>
    <form method="post" action="" onsubmit="return validatePassword();">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <?php if ($usrer): ?>
            <p style="color: red;"><?php echo $usrer; ?></p>
        <?php endif; ?>

        <label for="name">Full Name:</label>
        <input type="text" name="name" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <?php if ($passer): ?>
            <p style="color: red;"><?php echo $passer; ?></p>
        <?php endif; ?>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="date" required>

        <label for="sex">Sex:</label>
        <select name="sex" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        

        <button type="submit">Sign Up</button>

        

    </form>
</body>
</html>