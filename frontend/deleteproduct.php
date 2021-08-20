<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Delete Product Item </title>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/bootstrap/4.5.3/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/bootstrap/4.5.3/js/bootstrap.min.js"></script>

</head>
<body>
<center>

    <?php

    require 'dbinfo.php';

    echo '<table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" style="width:10%; text-align:center">Prodcuct ID</th>
            <th scope="col" style="width:18%; text-align:center">Prodcuct Type</th>
            <th scope="col" style="width:18%; text-align:center">Prodcuct Price</th>
        </tr>
        </thead>
        <tbody>';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn)die("Connection failed: " . mysqli_connect_error());
    $sql1="select id,type,price from products";
    $retval = mysqli_query($conn, $sql1);
    for ($i=0; $i<$retval->num_rows; $i++) {
        echo '<tr>';
        $row = mysqli_fetch_assoc($retval);
        $id = $row['id'];
        $type = $row['type'];
        $price = $row['price'];
        echo '<td bgcolor="#3cb371" style="text-align:center">'.$id.'</td>';
        echo '<td bgcolor="#3cb371" style="text-align:center">'.$type.'</td>';
        echo '<td bgcolor="#3cb371" style="text-align:center">'.$price.'</td>';
        echo '</tr>';
    }//display all the products in a table

    echo  '</tbody></table>';

    if(isset($_POST["submit"])){
        $id=$_POST['id'];
        //get the timeslot to be deleted from admin's input
        $sql2="select id from products";
        $retval2 = mysqli_query($conn, $sql2);
        $flag=0;
        for ($i=0; $i<$retval2->num_rows; $i++) {
            $row = mysqli_fetch_assoc($retval2);
            if(in_array($id,$row))$flag=1;
        }
        //check if there is indeed a such timeslot
        if($flag==0)echo "ERROR! Record does not exist.";
        else{
            $sql3="delete from products where id='$id'";
            mysqli_query($conn, $sql3);
            //then delete the timeslot record from table timeslot (and automatically in timeslotforlabuser)
            echo '<script> alert("Delete SUCCESS!")</script>';
            echo '<script>window.location.href="deleteproduct.php";</script>';
        }
    }

    ?>

    </div>
    <form action="" method="post">
        <input type="text" required name="id" autocomplete="off" placeholder="product id">
        <button name="submit" value="submit">Delete a existing product</button>
        <!--ask the admin which timeslot he wants to delete-->
    </form>
    </div>

    <br><br>
    <button onclick="location='frontend.php'">Main Page</button>
    <button onclick="location='lab_schedule.php'">View Schedule</button>

</center>
</body>
</html>
