<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Entrance</title>
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

        .box {
            height: 60vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
           
        }

        .button {
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

        .button:hover {
            background: #76b8ff;
            transform: scale(1.1);
        }

        h1,h3, p{
            color: white;
        }

        .logout{
            font-size: 20px; 
        }

    </style>
</head>

<body>
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </header>
    <div class="box">
            <h1>Portfolio</h1>
            <h3>Please login to your exisiting account </h3>
            <a href="login.php" class="button">Login</a>
            <h3>Or be my guest and create a new account for you </h3>
            <a href="Signup.php" class="button">Sign Up</a>          
    </div>

</body>

</html>