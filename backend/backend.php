<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Main Page </title>
    <!--This is the main page of the site-->
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Using bootstrap to embellish the site -->
    <meta name="viewport" content="width=device-width, height=device-height user-scalable=yes,
  initial-scale=2.5, maximum-scale=3.0, minimun-scale=1.0">

    <style>
        @import "css1.css";
    </style>
</head>
<body>
<center>
<h3>Backend Admin Page</h3>

<?php

if (!isset($_COOKIE["user"])||$_COOKIE["user"]!="admin")
    die('Error!you have to login admin account to use here');


?>

    <br><button class="btn btn-primary" onclick="location='checkuser.php'">Check Users</button>
    <button class="btn btn-primary" onclick="location='checkproduct.php'">Check Products</button>
    <button class="btn btn-info" onclick="location='../project.php'">Site Main Page</button>

</center>
</body>
</html>
