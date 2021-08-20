<!DOCTYPE html>
<html>
<head>
    <title>timeslot</title>
    <meta charset="UTF-8">
    <style>
        @import "css1.css";
    </style>
</head>
<body>
</div>

<form action="" method="post">
    <input type="username" required name="id" autocomplete="off" placeholder="Product id: 5 digits integer">
    <input type="username" required name="type" autocomplete="off" placeholder="type(<50bytes)">
    <input type="username" required name="pname" autocomplete="off" placeholder="Product name(<100bytes)">
    <input type="username" required name="brand" autocomplete="off" placeholder="brand(<50bytes)">

    <select name="size">
        <option value="small">small</option>
        <option value="medium">medium</option>
        <option value="large">large</option>
        <option value="x-large">x-large</option>
    </select>

    <select name="color">
        <option value="white">white</option>
        <option value="black">black</option>
        <option value="blue">blue</option>
        <option value="grey">grey</option>
        <option value="green">green</option>
        <option value="yellow">yellow</option>
        <option value="red">red</option>
        <option value="pink">pink</option>
        <option value="purple">purple</option>
        <option value="khaki">khaki</option>
        <option value="brown">brown</option>
        <option value="silver">silver</option>
        <option value="gold">gold</option>
    </select>
    <!--using two 'select' sections to get the size and color-->
    <input type="username" required name="price" autocomplete="off" placeholder="Price(float)">
    <input type="username" required name="made_in" autocomplete="off" placeholder="Made_in(<50bytes)">
    <input type="username" required name="caption" autocomplete="off" placeholder="Caption(<1000bytes)">

    <input type="submit" value="Add a new product" name="submit1">
    <!--submit the 'select' values to the same page-->
</form>
</div>
<button onclick="location='frontend.php'">Back to main page</button>

<?php

require 'dbinfo.php';

if(isset($_POST["submit1"])){
    $id=$_POST['id'];
    $type=$_POST['type'];
    $pname=$_POST['pname'];
    $brand=$_POST['brand'];
    $size=$_POST['size'];
    $color=$_POST['color'];
    $price=$_POST['price'];
    $made_in=$_POST['made_in'];
    $caption=$_POST['caption'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn)die("Connection failed: " . mysqli_connect_error());

    $sql2="select id from products";
    $retval2 = mysqli_query($conn, $sql2);
    $flag=0;
    for ($i=0; $i<$retval2->num_rows; $i++) {
        $row = mysqli_fetch_assoc($retval2);
        if(in_array($id,$row))$flag=1;
    }
//check if there is indeed a such user
    if($flag==1)echo "ERROR! Product with same id already exists!";
    else{
        $sql3="insert into products values ('$id','$type','$pname','$brand','$size','$color','$price','$made_in','$caption')";
        mysqli_query($conn, $sql3);
        //delete the lab user from labuser, and the record in timeslotforlabuser will be deleted automatically
        echo '<script> alert("Add procduct SUCCESS!")</script>';
        echo '<script>window.location.href="frontend.php";</script>';
    }

}







?>

</body>
</html>
