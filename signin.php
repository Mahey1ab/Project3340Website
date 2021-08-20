<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <style>
        @import "css1.css";
    </style>
</head>
<body>
</div>
<form action="" method="post">
    <input type="username" placeholder="Account" name="username" id="usr" required autocomplete="off">
    <input type="password" placeholder="Password" name="password" id="psd" required autocomplete="off">
    <button name="submit" type="submit" id="butn">Login</button>
</form>
</div>
<style>
    body{
        background-repeat:no-repeat;
    }
    .getAcc input{
        background:none;
        padding-bottom:0;
        border-width:0 0 2px;
        border-color:rgba(254,224,223,1);
        outline:none;
    }
</style>
</body>
<?php
if(isset($_POST["submit"]))
{

    require 'dbinfo.php';

    $dbh = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $usr=$_POST["username"];
    $pwd=$_POST["password"];
    $cusr=$dbh->query("select username from users where username='$usr';");
    $cpwd=$dbh->query("select username from users where username='$usr' and password='$pwd';");

    $row1=$cusr->fetch(PDO::FETCH_BOTH);
    $row2=$cpwd->fetch(PDO::FETCH_BOTH);
    if(empty($row1[0]))
    {
        $dbh=null;
        echo "<script> alert('no account') </script>";
    }
    else if(empty($row2[0]))
    {
        $dbh=null;
        echo "<script> alert('wrong username or password') </script>";
    }
    else
    {
        $dbh->query("update users set login=1 where username='$usr'");
        foreach($_COOKIE as $key=>$value){
            setCookie($key,"",time()-60);
        }
        setcookie("user", $usr,time()+3600);
        $dbh=null;
        echo "<script> alert('login success') </script>";
        header('location:project.php');

    }
}
?>