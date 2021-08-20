<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Product Page </title>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/bootstrap/4.5.3/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/bootstrap/4.5.3/js/bootstrap.min.js"></script>

  <style>
    @import "css1.css";
    .mailTable tr td{
      width: 200px;
      height: 35px;
      line-height: 35px;
      box-sizing: border-box;
      padding: 0 10px;
      border-bottom: 1px solid #E6EAEE;
      border-right: 1px solid #E6EAEE;
    }
    .mailTable tr td.column {
      background-color: #EFF3F6;
      color: #393C3E;
      width: 30%;
    }
  </style>

</head>
<body>

<?php

    require 'dbinfo.php';
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pid =$_POST["pid"];

    $imagefile="picture/".$pid.".png";

    $statement=$dbh->query("select type,pname,brand,size,color,price,made_in,caption from products where id=$pid;");

    while(list($type,$pname,$brand,$size,$color,$price,$made_in,$caption)=$statement->fetch(PDO::FETCH_NUM))
    {
        echo "<table class='table'>";
        echo '<tr><td class="column">Picture</td><td><img src="?" id="img0" alt=""/></td></tr>';
        echo '<tr><td class="column">Product Id</td><td>'.$pid.'</td></tr>';
        echo '<tr><td class="column">Type</td><td>'.$type.'</td></tr>';
        echo '<tr><td class="column">Name</td><td>'.$pname.'</td></tr>';
        echo '<tr><td class="column">brand</td><td>'.$brand.'</td></tr>';
        echo '<tr><td class="column">Size</td><td>'.$size.'</td></tr>';
        echo '<tr><td class="column">Color</td><td>'.$color.'</td></tr>';
        echo '<tr><td class="column">Price</td><td>'.$price.'</td></tr>';
        echo '<tr><td class="column">Made In</td><td>'.$made_in.'</td></tr>';
        echo '<tr><td class="column">Caption</td><td style="word-break : break-all;" width=80%;>'.$caption.'</td></tr>';
        echo "</table>";

        setcookie($pid,1);
        //cookie
    }

    echo '<form method="post" action="cart.php">
          <input type="submit" value="Add to cart">
          <div><input type="hidden" name="pid" id="b0"  value="?"</div></form></td>';

?>




<script type="text/javascript">
    var temp1="<?php echo $imagefile?>";
    var temp2="<?php echo $pid?>";
    document.getElementById("img0").src=temp1;
    document.getElementById("b0").value=temp2;
</script>


</body>
</html>