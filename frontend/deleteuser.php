<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Delete user </title>

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
            <th scope="col" style="width:10%; text-align:center">User Name</th>
            <th scope="col" style="width:18%; text-align:center">Password</th>
            <th scope="col" style="width:18%; text-align:center">Login</th>
        </tr>
        </thead>
        <tbody>';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)die("Connection failed: " . mysqli_connect_error());
$sql1="select username,password,login from users";
$retval = mysqli_query($conn, $sql1);
for ($i=0; $i<$retval->num_rows; $i++) {
    echo '<tr>';
    $row = mysqli_fetch_assoc($retval);
    $usr = $row['username'];
    $pas = $row['password'];
    $log = $row['login'];
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$usr.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$pas.'</td>';
    echo '<td bgcolor="#3cb371" style="text-align:center">'.$log.'</td>';
    echo '</tr>';
}//display all the users' information in a table

echo   '</tbody></table>';

if(isset($_POST["submit"])){
    $usr=$_POST['username'];
    if($usr=='admin') die("You can not delete admin user");

    //get the user's name to be deleted from input
    $sql2="select username from users";
    $retval2 = mysqli_query($conn, $sql2);
    $flag=0;
    for ($i=0; $i<$retval2->num_rows; $i++) {
       $row = mysqli_fetch_assoc($retval2);
       if(in_array($usr,$row))$flag=1;
    }
    //check if there is indeed a such user
    if($flag==0)echo "ERROR! Record does not exist";
    else{
        $sql3="delete from users where username='$usr'";
        mysqli_query($conn, $sql3);
        //delete the lab user from labuser, and the record in timeslotforlabuser will be deleted automatically
        echo '<script> alert("Delete SUCCESS!")</script>';
        echo '<script>window.location.href="deleteuser.php";</script>';
    }
}

?>

    </div>
    <form action="" method="post">
        <input type="text" required name="username" autocomplete="off" placeholder="username">
        <button name="submit" value="submit">Delete a existing user</button>
    </form>
    </div>
    <!--ask admin to enter the first and last name of the user he wants to delete-->
    <br><br>
    <button onclick="location='frontend.php'">Main Page</button>

</center>
</body>
</html>
