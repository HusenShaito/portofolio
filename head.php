<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <style>

header {
    background-image: url('images/back.jpg');
    background-size: cover;
    background-repeat: no-repeat;
color: #fff;
text-align: center;
padding: 25px;
margin:-10px;
}

.menu-container {
margin-top: 20px;
display: flex;
background-color: #3c72ac;
float: right;
}

.dropdown-btn {
background: none;
border: none;
color: #fff;
cursor: pointer;
font-size: 20px;
padding: 15px;
text-align: center;
}

.dropdown-menu {
display: none;
position: absolute;
background-color: #76b8ff;
list-style: none;
float: right;
margin: 0;
padding: 0;
}

.dropdown-menu li {
padding: 10px;
}

.dropdown-menu a {
color: #fff;
text-decoration: none;
}

.dropdown-menu a:hover {
text-decoration: none;
color:3c72ac;
}

.dropdown-btn:hover + .dropdown-menu,
.dropdown-menu:hover {
display: block;
}

        img {
                width: 130px;
                height: auto;
                position: absolute;
                top: 40px;
                left: 50px;
                border-radius: 30%;
            }
                

            .logout-button {
                color: #ffffff;
                text-decoration: none;
                padding: 8px;
                border-radius: 4px;
                background-color: #3c72ac;
                margin-bottom: 50px;
            }

            .logout-button:hover {
                background-color: #76b8ff;
                color: #fff;
                cursor: pointer;
            }

            .username{
                color: #3c72ac; 
                margin-right: 12px;
                font-size:20px;
                font-weight:bold;   
            }

            h1 {
            color: #f3f2f2;
            text-align:center;
            font-family: "Georgia", sans-serif;
            }

           

            h3 {
                color: #f3f2f2;
                margin-left:-70px;
                font-family: "Georgia", sans-serif;
                
            }

            </style>

    
    </head>

    <body>
        <header>
        <div style="text-align: right; padding: 10px;">
            <?php

            if (isset($_SESSION['username'])) {
                echo '<span class="username"> welcome ' . $_SESSION['username'] . '</span> ';
                echo '<a class="logout-button" href="index.php">Logout</a>';
            }
            ?>
        </div>
            <img src="images/lion.jpg" alt="Husen Shaito">
            <nav>
                <div class="menu-container">
                    <button class="dropdown-btn">Menu</button>
                    <ul class="dropdown-menu">
                        <li><a href="MainPage.php">Home</a></li>
                        <li><a href="CV.php">CV</a></li>
                        <li><a href="Gallery.php">Gallery</a></li>
                    </ul>
                </div>
            </nav>  
            <h1><strong>Husen Shaito</strong></h1>
            <h3>Computer Science Student</h3>
        </header>
    </body>


</html>
