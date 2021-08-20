<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Delete user </title>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/bootstrap/4.5.3/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/bootstrap/4.5.3/js/bootstrap.min.js"></script>

</head>
<body>

<?php

require 'dbinfo.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)die("Connection failed: " . mysqli_connect_error());

if(isset($_POST["submit1"])){

    if(!isset($_POST['DeliveryWay'])||!isset($_POST['DeliveryTime'])||!isset($_POST['PaymentMethod'])){
        echo "<script>alert('Some details not specified, please choose again');</script>";
        echo '<script>window.location.href="orderchoice.php";</script>';
    }

    $dw=$_POST['DeliveryWay'];
    $dt=$_POST['DeliveryTime'];
    $pm=$_POST['PaymentMethod'];
    $d_cost=0;
    if($dw=="Normal Delivery")$d_cost=3.5;
    if($dw=="Express Delivery")$d_cost=8.5;

    echo '<table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" style="width:10%; text-align:center">Order Item</th>
            <th scope="col" style="width:18%; text-align:center">Info(Quatity)</th>
        </tr>
        </thead>
        <tr>
             <td bgcolor="#3cb371" style="text-align:center">Customer Name</td>
             <td bgcolor="#3cb371" style="text-align:center">'.$_COOKIE['user'].'</td>
        </tr>
        <tbody>';

    $i=0;
    $cost=0;
    foreach ($_COOKIE as $key=>$value){
        if($i==0 or $i==count($_COOKIE)-1)
            $i++;
        else{
            echo '<tr>';
            $sql2="select price from products where id='$key'";
            $retval2 = mysqli_query($conn, $sql2);
            $row = mysqli_fetch_assoc($retval2);
            $i++;
            if($value!=""){
                 echo '<td bgcolor="#3cb371" style="text-align:center">'.$key.'</td>';
                 echo '<td bgcolor="#3cb371" style="text-align:center">'.$value.'</td>';
                 $cost+=$value*$row['price'];
            }
            echo '</tr>';
        }
    }
    $total=$cost+$d_cost;

    echo '<tr><td bgcolor="#3cb371" style="text-align:center">Delivery Way</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$dw.'</td></tr>';
    echo '<tr><td bgcolor="#3cb371" style="text-align:center">Delivery Time</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$dt.'</td></tr>';
    echo '<tr><td bgcolor="#3cb371" style="text-align:center">Payment Method</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$pm.'</td></tr>';
    echo '<tr><td bgcolor="#3cb371" style="text-align:center">Merchandise Cost</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$cost.'</td></tr>';
    echo '<tr><td bgcolor="#3cb371" style="text-align:center">Delivery Cost</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$d_cost.'</td></tr>';
    echo '<tr><td bgcolor="#cd5c5c" style="text-align:center">Total Cost</td>';
    echo '<td bgcolor="#cd5c5c" style="text-align:center">'.$total.'</td></tr>';
    echo '</tbody></table>';
}


?>
<center>
<button class="btn btn-danger" onclick="location='#'">Submit order</button>
<button class="btn btn-primary" onclick="location='project.php'">Main Page</button>
</center>
</body>
</html>