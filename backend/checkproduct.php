<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Check Product Page </title>
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
    <h3>Check Product Page</h3>

<?php
require '../dbinfo.php';
if (!isset($_COOKIE["user"])||$_COOKIE["user"]!="admin")
    die('Error!you have to login admin account to use here');

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
    die("Connection failed: " . mysqli_connect_error());
else
    echo "<br><h4>Products database is working normally</h4><br>";

$sql1="select type from products";
$retval = mysqli_query($conn, $sql1);

$type0=$type1=$type2=$type3=$type4=$type5=$type6=0;
$sum=$retval->num_rows;

for ($i=0; $i<$retval->num_rows; $i++) {
    $row = mysqli_fetch_assoc($retval);
    if($row['type']=='Private')$type0++;
    if($row['type']=='ManHat')$type1++;
    if($row['type']=='WomenHat')$type2++;
    if($row['type']=='ManPurse')$type3++;
    if($row['type']=='WomanPurse')$type4++;
    if($row['type']=='Backpack')$type5++;
    if($row['type']=='GymBag')$type6++;

}

echo "<br><h4>Number of all products: $sum</h4><br>";
echo "<br><h4>Number of private goods for registered users: $type0</h4><br>";
echo "<br><h4>Number of man's hats: $type1</h4><br>";
echo "<br><h4>Number of woman's hats: $type2</h4><br>";
echo "<br><h4>Number of man's purses: $type3</h4><br>";
echo "<br><h4>Number of woman's purses: $type4</h4><br>";
echo "<br><h4>Number of backpacks: $type5</h4><br>";
echo "<br><h4>Number of gym bags: $type6</h4><br>";

?>

<button class="btn btn-info" onclick="location='backend.php'">Main Page</button>

</center>
</body>
</html>