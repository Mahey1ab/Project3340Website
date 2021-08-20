<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <style>
        @import "css1.css";
    </style>
</head>
<body>
<div id="r_fm">
    <form action="" method="post">
        <input type="username" id="reg_urn" required name="username" autocomplete="off" placeholder="Username">
        <input type="password" id="reg_pwd" required name="password" autocomplete="off" placeholder="Password">
        <button name="submit" value="submit">Register</button>
    </form>
</div>
</body>
</html>
<?php

require 'dbinfo.php';

if(isset($_POST["submit"]))
{
    header("charset='utf-8'");
    $dbh = mysqli_connect($servername, $username, $password, $dbname);
    if(!$dbh)die("Connection failed: " . mysqli_connect_error());


    $urn=$_POST["username"];
    $check_length = strlen($_POST["password"]);
    if($check_length<6||$check_length>16)
    {
        echo '<script>alert("The length of the password should between 6 and 26!");</script>';
    }
    else
    {
        $pwd=$_POST["password"];
        $sql = "select username from users where username='$urn'";
        $retval=mysqli_query($dbh,$sql);
        $row = mysqli_fetch_assoc($retval);

        $sql2 = "insert into users values ('$urn','$pwd','0')";

        if(empty($row))
        {
            mysqli_query($dbh,$sql2);
            $dbh=null;
            echo "<script> alert('Register Success') </script>";
            echo '<script>window.location.href="signin.php";</script>';
        }
        else
        {
            $dbh=null;
            echo "<script> alert('ERROR! User name is used') </script>";
        }
    }
}
?>