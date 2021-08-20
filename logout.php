
<?php

require 'dbinfo.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)die("Connection failed: " . mysqli_connect_error());

$name=$_COOKIE['user'];
$sql="update users set login=0 where username='$name'";
mysqli_query($conn,$sql);

?>

<script>
    clearAllCookie();

    function clearAllCookie() {
        var keys = document.cookie.match(/[^ =;]+(?=\=)/g);
        if(keys) {
            for(var i = keys.length; i--;)
                document.cookie = keys[i] + '=0;expires=' + new Date(0).toUTCString()
        }
        window.location.href='project.php';
    }
</script>
