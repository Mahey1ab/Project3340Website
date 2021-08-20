<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Edit product </title>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/bootstrap/4.5.3/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/bootstrap/4.5.3/js/bootstrap.min.js"></script>

    <style>
        @import "css1.css";
    </style>

</head>
<body>
<center>

<?php

require 'dbinfo.php';

echo '<table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" style="width:10%; text-align:center">Prodcuct ID</th>
            <th scope="col" style="width:18%; text-align:center">Type</th>
            <th scope="col" style="width:18%; text-align:center">Name</th>
            <th scope="col" style="width:18%; text-align:center">Brand</th>
            <th scope="col" style="width:18%; text-align:center">Size</th>
            <th scope="col" style="width:18%; text-align:center">Color</th>
            <th scope="col" style="width:18%; text-align:center">Price</th>
            <th scope="col" style="width:18%; text-align:center">Made In</th>
        </tr>
        </thead>
        <tbody>';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)die("Connection failed: " . mysqli_connect_error());
$sql1="select id,type,price,pname,size,color,brand,made_in from products";
$retval = mysqli_query($conn, $sql1);
for ($i=0; $i<$retval->num_rows; $i++) {
    echo '<tr>';
    $row = mysqli_fetch_assoc($retval);
    $id = $row['id'];
    $pname = $row['pname'];
    $type = $row['type'];
    $price = $row['price'];
    $size = $row['size'];
    $color = $row['color'];
    $made_in = $row['made_in'];
    $brand = $row['brand'];

    echo '<td bgcolor="#3cb371" style="text-align:center">'.$id.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$type.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$pname.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$brand.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$size.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$color.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$price.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$made_in.'</td>';

    echo '</tr>';
}//display all the products in a table

    if(isset($_POST['submit1'])){
        $id=$_POST['id'];
        $type=$_POST['type'];
        $pname=$_POST['pname'];
        $brand=$_POST['brand'];
        $size=$_POST['size'];
        $color=$_POST['color'];
        $price=$_POST['price'];
        $made_in=$_POST['made_in'];
        $caption=$_POST['caption'];

        $sql2 = "select id from products";
        $retval2 = mysqli_query($conn, $sql2);
        $flag = 0;
        for ($i = 0; $i < $retval2->num_rows; $i++) {
            $row = mysqli_fetch_assoc($retval2);
            if (in_array($id, $row)) $flag = 1;
        }

        if ($flag == 0) echo "ERROR! Product does not exist!";
        else {
               $sql3 = "UPDATE products SET type='$type',pname='$pname',brand='$brand',size='$size',
                    color='$color',price='$price',made_in='$made_in',caption='$caption' WHERE `id`='$id'";
               mysqli_query($conn, $sql3);

               echo '<script> alert("Edit procduct SUCCESS!")</script>';
               echo '<script>window.location.href="editproduct.php";</script>';
        }


    }
?>

    </div>

    <form action="" method="post">
        <input type="username" required name="id" autocomplete="off" placeholder="Product id to be edited"><br>
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

        <input type="submit" value="Edit a new product" name="submit1">
        <!--submit the 'select' values to the same page-->
    </form>
    </div>

    <button onclick="location='frontend.php'">Back to main page</button>

</center>
</body>
</html>
