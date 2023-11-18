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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="styles/mainpagestyle.css">
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
