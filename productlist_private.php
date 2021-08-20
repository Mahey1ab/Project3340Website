<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Product List </title>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        @import "css1.css";
    </style>

</head>
<body>
<center>

<?php
    require 'dbinfo.php';

    $type="Private";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn)die("Connection failed: " . mysqli_connect_error());

    function createlist($page,$conn,$type){
        $index=array();
        $sql2="select id,pname,price from products where type='$type'";
        $retval2 = mysqli_query($conn, $sql2);

        for ($i=0; $i<4*$page&&$i<$retval2->num_rows; $i++) {
            $row = mysqli_fetch_assoc($retval2);
            if($i<4*($page-1))continue;
            else
                array_push($index,$row['id']);
            array_push($index,$row['price']);
        }
        array_push($index,$retval2->num_rows);
        return $index;
    }


    function pages($page,$type){
        echo '<input type="submit" name="page" value='.$page.'>';
        echo '<input type="hidden" name="type" value='.$type.'>';
    }


if (!isset($_COOKIE["user"])||$_COOKIE["user"]="") {
      echo "<script>alert('You have to login to use this section!')</script>";
      header('location:signin.php');
}
else{
      if(!isset($_POST['page'])){
          $page=1;
          $index=createlist($page,$conn,$type);
      }
      else{
          $page=$_POST['page'];
          $index=createlist($page,$conn,$type);
          $leng=array_pop($index);
      }

      $imagefilename=array();
      for($i=0,$j=0;$i<count($index);$i=$i+2)$imagefilename[$j++]="picture/".$index[$i].".png";
      $str1=json_encode($index);
      $str2=json_encode($imagefilename);

      //echo '<p id="demo"></p>';

      echo '<table class="table">';
      echo "<caption><h2>Private Goods for Registered User </h2></caption>";
      echo "<tr>";
      if(isset($index[0])){
          echo '<td style="width:33%"><img src="?" id="img0" />
         Product ID:'.$index[0].'
         Price: $'.$index[1].'
         <form method="post" action="product.php" >
         <input type="submit" value="Details">
         <div><input type="hidden" name="pid" id="b0"  value="?"></div></form></td>';
      }
      if(isset($index[2])){
          echo '<td style="width:33%"><img src="?" id="img1" />
         Product ID:'.$index[2].'
         Price: $'.$index[3].'
         <form method="post" action="product.php" >
         <input type="submit"  value="Details">
         <div><input type="hidden" name="pid" id="b1"  value="?"></div></form></td>';
      }
      echo "</tr>";
      if(isset($index[4])){
          echo '<td style="width:33%"><img src="?" id="img2" />
         Product ID:'.$index[4].'
         Price: $'.$index[5].'
         <form method="post" action="product.php" >
         <input type="submit" value="Details">
         <div><input type="hidden" name="pid" id="b2"  value="?"></div></form></td>';
      }
      if(isset($index[6])){
          echo '<td style="width:33%"><img src="?" id="img3" />
         Product ID:'.$index[6].'
         Price: $'.$index[7].'
         <form method="post" action="product.php" >
         <input type="submit"  value="Details">
         <div><input type="hidden" name="pid" id="b3"  value="?"></div></form></td>';
      }

      echo "</table>";
      echo "<h4>Page $page</h4>";
      echo '<form method="post" action="prodcutlist.php">';

      $page_next=$page+1;
      $page_pre=$page-1;
      if($page==1)pages($page_next,$type);
      else if($page*4>$leng)pages($page_pre,$type);
      else{
          pages($page_pre,$type);
          pages($page_next,$type);
      }

      echo '</form>';

}



?>

</center>
<script type="text/javascript">
    var index=<?php echo $str1?>;
    var ifn=<?php echo $str2?>;
    document.getElementById("img0").src=ifn[0];
    document.getElementById("b0").value=index[0];
    document.getElementById("img1").src=ifn[1];
    document.getElementById("b1").value=index[2];
    document.getElementById("img2").src=ifn[2];
    document.getElementById("b2").value=index[4];
    document.getElementById("img3").src=ifn[3];
    document.getElementById("b3").value=index[6];
</script>




</body>
</html>

