
<html>

<?php

require 'dbinfo.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)die("Connection failed: " . mysqli_connect_error());
$sql1="select size from products";
$retval = mysqli_query($conn, $sql1);
$result=array(0,0,0,0);

for ($i=0; $i<$retval->num_rows; $i++) {
   $row = mysqli_fetch_assoc($retval);
   if($row['size']=='small')$result[0]+=1;
   if($row['size']=='medium')$result[1]+=1;
   if($row['size']=='large')$result[2]+=1;
   if($row['size']=='x-large')$result[3]+=1;
}

echo '<center><h3>Proportion of Products in different Sizes</h3></center>';
?>

<p>
    <canvas id="canvas_circle" width="800" height="450"> </canvas>
</p>

<body>
  <input type="hidden" id="r0" value="<?php echo $result[0] ?>" />
  <input type="hidden" id="r1" value="<?php echo $result[1] ?>" />
  <input type="hidden" id="r2" value="<?php echo $result[2] ?>" />
  <input type="hidden" id="r3" value="<?php echo $result[3] ?>" />
</body>

<script type="text/javascript">


    function drawCircle(canvasId, data_arr, color_arr, text_arr)
    {
        var c = document.getElementById(canvasId);
        var ctx = c.getContext("2d");

        var radius = c.height / 2 - 20;
        var ox = radius + 20, oy = radius + 20;

        var width = 30, height = 10;
        var posX = ox * 2 + 20, posY = 30;
        var textX = posX + width + 5, textY = posY + 10;

        var sum=0;
        for(var i=0;i<data_arr.length;i++)sum+=data_arr[i];

        var startAngle = 0;
        var endAngle = 0;
        for (var i = 0; i < data_arr.length; i++)
        {

            endAngle = endAngle + data_arr[i]/sum * Math.PI * 2;
            ctx.fillStyle = color_arr[i];
            ctx.beginPath();
            ctx.moveTo(ox, oy);
            ctx.arc(ox, oy, radius, startAngle, endAngle, false);
            ctx.closePath();
            ctx.fill();
            startAngle = endAngle;


            ctx.fillStyle = color_arr[i];
            ctx.fillRect(posX, posY + 20 * i, width, height);
            ctx.moveTo(posX, posY + 20 * i);

            ctx.font = 'bold 14px arial';
            ctx.fillStyle = color_arr[i]; //"#000000";
            var percent = text_arr[i] + "||quantity:" +data_arr[i]+" proportion:"+ (100 * data_arr[i]/sum).toFixed(2) + "%";
            ctx.fillText(percent, textX, textY + 20 * i);
        }
    }

    function init(p1,p2,p3,p4) {
        //data to draw

        var data_arr = [p1,p2,p3,p4];
        var color_arr = ["Navy",'Crimson','DarkKhaki','YellowGreen'];
        var text_arr = ["small size", "medium size", "large size", "x-large size"];

        drawCircle("canvas_circle", data_arr, color_arr, text_arr);
    }

    let r0=parseInt(document.getElementById("r0").value);
    let r1=parseInt(document.getElementById("r1").value);
    let r2=parseInt(document.getElementById("r2").value);
    let r3=parseInt(document.getElementById("r3").value);

    init(r0, r1, r2, r3);

</script>
</html>