<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    @import "css1.css";
  </style>
</head>
<body>

<?php

require 'dbinfo.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)die("Connection failed: " . mysqli_connect_error());

if (isset($_COOKIE["user"])&&$_COOKIE["user"]!="") {
    echo "<h3>Welcome " . $_COOKIE["user"] . "! This is your Shopping Cart.</h3><br>";
    //print_r($_COOKIE);
    $cart=array();
    $i=0;
    foreach ($_COOKIE as $key=>$value){
        if($i==0 or $i==count($_COOKIE)-1)
            $i++;
        else{
            //echo "<br>".$key."+++".$value;
            $sql2="select pname,price from products where id='$key'";
            $retval2 = mysqli_query($conn, $sql2);

            $row = mysqli_fetch_assoc($retval2);
            $i++;
            if($value!=""){
                array_push($cart,$key);
                array_push($cart,$row['pname']);
                array_push($cart,$row['price']);
                array_push($cart,$value);
            }
        }
    }

}
else{
   echo "<script>alert('You have to login to use this section!')</script>";
   header('location:signin.php');
}
?>


<table id="table_1">
    <tr>
        <th width=10% ><h3>Item</h3></th>
        <th width=20%><h3>Name</h3></th>
        <th width=15%><h3>Price</h3></th>
        <th width=15%><h3>Quantity</h3></th>
        <th width=15%><h3>Action</h3></th>
    </tr>
</table>



<table>
  <tr>
    <td colspan="2"><h3>Total cost:</h3></td>
    <td colspan="3"><h3 id="Total"></h3></td>
  </tr>
</table>

<p id="demo"></p>



<script>
    var temp = <?php echo json_encode($cart)?>;
    for(var i=0;i+4<=temp.length;i=i+4)
        new_item(temp[i],temp[i+1],temp[i+2],temp[i+3]);
    <!-- function for adding an new item to shopping cart -->
    function new_item(id,name,price,quantity) {
        <!--check which item it is-->
        var r=check(id);<!--see check() function below-->
        <!--if the same item does not exist in the shopping cart yet, insert it into cart-->
        if(r==0){

            var td_id = document.createElement("td");
            var text_id = document.createTextNode(id);
            td_id.appendChild(text_id);

            var td_name = document.createElement("td");
            var text_name = document.createTextNode(name);
            td_name.appendChild(text_name);
            <!--price-->
            var td_price = document.createElement("td");
            var text_price = document.createTextNode(price);
            td_price.appendChild(text_price);
            <!--quantity-->
            var td_q = document.createElement("td");
            var text_q = document.createTextNode(quantity);
            td_q.appendChild(text_q);

            <!--3 buttons-->
            var td_button=document.createElement("td");
            var element_a=document.createElement("input");
            var element_b=document.createElement("input");
            var element_c=document.createElement("input");
            element_a.setAttribute("type","button");
            element_a.setAttribute("onclick","add_q(this)");
            element_a.setAttribute("value","+");
            element_b.setAttribute("type","button");
            element_b.setAttribute("onclick","sub_q(this)");
            element_b.setAttribute("value","-");
            element_c.setAttribute("type","button");
            element_c.setAttribute("onclick","deleteTr(this)");
            element_c.setAttribute("value","X");
            td_button.appendChild(element_a);
            td_button.appendChild(element_b);
            td_button.appendChild(element_c);

            var tr = document.createElement("tr");
            tr.appendChild(td_id);
            tr.appendChild(td_name);
            tr.appendChild(td_price);
            tr.appendChild(td_q);
            tr.appendChild(td_button);
            <!--append tr to table_1-->
            var tb = document.getElementById("table_1");
            tb.appendChild(tr);

        }
        <!--if same item already exists, add 1 quantity-->
        else {
            var tb= document.getElementById("table_1");
            var temp=parseInt(tb.rows[r].cells[3].innerHTML)+1;
            tb.rows[r].cells[3].innerHTML=temp;
        }

        total();
    }

    <!--auxiliary function for checking if there is an identical item-->
    function check(pid){
        var result=0;
        var i,temp;

        var tb= document.getElementById("table_1");
        var d=tb.getElementsByTagName("tr").length;

        for (i=1;i<d;i++){
            temp=parseInt(tb.rows[i].cells[0].innerHTML);
            if(pid==temp){
                result=i;
                break;
            }
        }
        return result;
    }
    <!-- delete an item-->
    function deleteTr(object) {
        alert("Alert: delete an product!");
        object.parentNode.parentNode.remove();

        var item=object.parentNode.parentNode.cells[0].innerHTML;
        document.cookie = item + "=" + "";

        total();
    }
    <!-- increse quantity for an item-->
    function add_q(object) {
        var td=object.parentNode.parentNode.cells[3].innerHTML;
        var output =parseInt(td)+1;
        object.parentNode.parentNode.cells[3].innerHTML=output;

        var item=object.parentNode.parentNode.cells[0].innerHTML;
        document.cookie = item + "=" + output;

        total();
    }
    <!-- decrese quantity for an item-->
    function sub_q(object) {
        var td=object.parentNode.parentNode.cells[3].innerHTML;
        var output =parseInt(td)-1;
        if(output<=0)
            deleteTr(object);
        else {
            object.parentNode.parentNode.cells[3].innerHTML=output;
            var item=object.parentNode.parentNode.cells[0].innerHTML;
            document.cookie = item + "=" + output;
        }
        total();
    }
    <!-- calculate and write the total cost-->
    function total(){
        var tb= document.getElementById("table_1");
        var d=tb.getElementsByTagName("tr").length;
        var i,price1,quantity1;
        var sum=0.00;
        for(i=1;i<d;i++){
            price1=parseFloat(tb.rows[i].cells[2].innerHTML);
            quantity1=parseFloat(tb.rows[i].cells[3].innerHTML);
            sum+=(price1*quantity1);
        }
        sum=sum.toFixed(2);
        document.getElementById("Total").innerHTML=sum;
    }

    function cartsubmit(){
        //document.cookie="cost"+"="+document.getElementById("Total").innerHTML;
        window.location.href="orderchoice.php";
    }

</script>

<button class="btn btn-info" onclick="location='project.php'">Main Page</button>
<button class="btn btn-danger" onclick="cartsubmit()">Submit</button>

</body>
</html>