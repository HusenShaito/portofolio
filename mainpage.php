<!DOCTYPE html>
<html lang="en">
<?php

include('head.php'); 
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.html');
    exit();
}
$username = $_SESSION['username'];


?>
<head>
    <title>Home Page</title>
<style>
body{
color: #40514E;
margin: 0%;
text-align: center;
font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}



.container {
display: flex;
flex-direction: row;
margin: auto;
width: 50%;
padding: 10px;
}

.box {
margin: 25px;
margin-top: 40px;
padding: 20px;
background-color: #fff;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
border-radius: 2%;
}

p {
line-height: 1.5;
}

.middle-container{
margin: 100px 0px;
}

.contact-message{
width: 40%;
margin: 40px auto 60px;
}

.btn {
background: #3c72ac;
-webkit-border-radius: 8;
-moz-border-radius: 8;
border-radius: 8px;
font-family: Arial;
color: #ffffff;
font-size: 20px;
padding: 10px 20px 10px 20px;
text-decoration: none;
}
.btn:hover {
background: #007BFF;
text-decoration: none;
}

.bottom-container{
background-color: #3c72ac;
padding: 50px 0 20px;
text-align: center;
}

.copyright{
color: #EAF6F6;
font-size: 0.75rem;
padding: 20px 0px;
}
</style>
</head>

<body>


<div class="container">
<div class="box">
<p>Hello and welcome to my portfolio! I'm Husen Shaito, a Senior Computer Scientist with a passion for technology and programming. This portfolio is a reflection of my journey, showcasing my work and experiences in the field..</p>
<p>Browse through my cv to check the variety of projects and see how I've applied my skills and expertise to achieve them.</p>

<p>you're here to learn more about my qualifications, discover my visual artistry, or simply get to know me
better, I hope you find this portfolio both informative and inspiring.</p>
<p>If you'd like to collaborate, have any questions, or just want to connect, feel free to get in touch through my info below. I'm always open to new opportunities and conversations.</p>
<p>Thank you so much for visitng my portofolio..</p>
</div>
</div>

<div class="middle-container">
<hr>
<div class="contact-me">
<p style="color: #3c72ac; font-size:20px;">Find my contact details below</h3>
<p>For any job, project, programs feel free and</p>
<a class="btn" href="mailto:husenshaito@gmail.com">Send me an email :)</a>
</div>

</div>


<div class="bottom-container">
<p class="copyright" >©  Husen Shaito 2023</p>
</div>

</body>

</html>
