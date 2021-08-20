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

<?php
  if (!isset($_COOKIE["user"])||$_COOKIE["user"]!="admin")die('Error!you have to login admin account to use here');
?>

    <h3>Frontend Admin Page</h3>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Functions</a>
            </div>
            <div>
                <ul class="nav navbar-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            User Management
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <!--li><a href="adduser.php">ADD</a></li-->
                            <li><a href="edituser.php">EDIT</a></li>
                            <li><a href="deleteuser.php">DELETE</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Products Management
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="addproduct.php">ADD</a></li>
                            <li><a href="editproduct.php">EDIT</a></li>
                            <li><a href="deleteproduct.php">DELETE</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!--using bootstrap's dropdown menu to display all the functionality pages' links-->
    <button class="btn btn-info" onclick="location='../project.php'">Back to Site Main page</button>
</center>
</body>
</html>