<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Check User Page </title>
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
    <h3>Check User Page</h3>

<?php

require '../dbinfo.php';
if (!isset($_COOKIE["user"])||$_COOKIE["user"]!="admin")
    die('Error!you have to login admin account to use here');

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
    die("Connection failed: " . mysqli_connect_error());
else
    echo "<br><h4>Users database is working normally</h4><br>";

$sql1="select login from users";
$retval = mysqli_query($conn, $sql1);

$login=0;
$sum=$retval->num_rows;

for ($i=0; $i<$retval->num_rows; $i++) {
    $row = mysqli_fetch_assoc($retval);
    if($row['login']==1)$login++;
}

echo "<br><h4>Number of all users: $sum</h4><br>";
echo "<br><h4>Number of users which logged in: $login</h4><br>";

?>

    <button class="btn btn-info" onclick="location='backend.php'">Main Page</button>

</center>
</body>
</html>