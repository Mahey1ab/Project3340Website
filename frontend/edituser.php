<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Edit user </title>

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
        $usr0=$_POST['username'];
        $usr1=$_POST['e_username'];
        $pas1=$_POST['e_password'];
        $log=$_POST['e_login'];

        //get the editing information  from admin's input
        $sql2="select username from users";
        $retval2 = mysqli_query($conn, $sql2);
        $flag0=$flag1=0;
        for ($i=0; $i<$retval2->num_rows; $i++) {
            $row = mysqli_fetch_assoc($retval2);
            if(in_array($usr0,$row))$flag0=1;
            if(in_array($usr1,$row))$flag1=1;
        }
        //check if there is indeed a such lab user
        if($flag0==0)echo "ERROR! Record does not exist";
        else{
            $sql3="update users set username='$usr1', password='$pas1', login='$log' 
                   where username='$usr0'";
            mysqli_query($conn, $sql3);
            //update the information
            echo '<script> alert("Edit SUCCESS!")</script>';
            echo '<script>window.location.href="edituser.php";</script>';
        }
    }

    ?>

    </div>
    <form action="" method="post">
        <input type="text" required name="username" autocomplete="off" placeholder="user's name"><br>
        <input type="text" required name="e_username" autocomplete="off" placeholder="new username">
        <input type="text" required name="e_password" autocomplete="off" placeholder="new password">
        <input type="text" required name="e_login" autocomplete="off" placeholder="login status:True or False">
        <button name="submit" value="submit">Edit a existing user</button>
    </form>
    <!--prompt the admin to enter the editing information-->
    </div>

    <br><br>
    <button onclick="location='frontend.php'">Main Page</button>

</center>
</body>
</html>
