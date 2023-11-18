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
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="styles/signupstyle.css">

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