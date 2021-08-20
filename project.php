<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Project </title>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta name="viewport" content="width=device-width, height=device-height user-scalable=yes,
  initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">

  <meta name = "keywords" content = "hat, purse, bag, man's hat, woman's hat, man's purse, woman's purse, gym bag,
  backpack" />

    <style>
        @import "css1.css";
    </style>
</head>
<body>
<center>

<h1>Shopping Site</h1>


<button class="btn btn-success" onclick="window.location.href='register.php'">User Registration</button>
  <button class="btn btn-success" onclick="window.location.href='signin.php'">Log In</button>
    <button class="btn btn-success" onclick="window.location.href='logout.php'">Log Out</button>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Product Type</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Hat
                  <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <form class="navbar-form navbar-left" action="prodcutlist.php" method="post">
                      <button type="submit" class="btn btn-default" name="type" value="ManHat">Man's hat</button>
                      <li class="divider"></li>
                      <button type="submit" class="btn btn-default" name="type" value="WomenHat">Woman's hat</button>
                  </form>
              </ul>
          </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Purse
                  <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <form class="navbar-form navbar-left" action="prodcutlist.php" method="post">
                      <button type="submit" class="btn btn-default" name="type" value="ManPurse">Man's Purse</button>
                      <li class="divider"></li>
                      <button type="submit" class="btn btn-default" name="type" value="WomanPurse">Woman's Purse</button>
                  </form>
              </ul>
          </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Bag
                  <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <form class="navbar-form navbar-left" action="prodcutlist.php" method="post">
                      <button type="submit" class="btn btn-default" name="type" value="Backpack">Backpack</button>
                      <li class="divider"></li>
                      <button type="submit" class="btn btn-default" name="type" value="GymBag">Gym Bag</button>
                  </form>
              </ul>
          </li>

          <li><a href="map/map.html">Interative Map</a></li>
          <li><a href="dataGraph.php">Data Visualization</a></li>
          <li><a href="picture/UserGuide.mp4">Help/User Training</a></li>
          <li><a href="http://comp3340.maren11n.myweb.cs.uwindsor.ca/contact2.0.html">Contact Us</a></li>
          <li><a href="http://comp3340.maren11n.myweb.cs.uwindsor.ca/about.html">About Us</a></li>

      </ul>
    </div>
  </div>
</nav>

<?php

    if (isset($_COOKIE["user"])&&$_COOKIE["user"]!=""&&$_COOKIE["user"]!="admin"){
        echo "<h3>Welcome " . $_COOKIE["user"] . "!</h3><br>";
        echo "<button class=\"btn btn-danger\" onclick=\"window.location.href='cart.php'\">
               Shopping Cart</button>";
        echo "<button class=\"btn btn-info\" onclick=\"window.location.href='productlist_private.php'\">
               Goods For Registered User</button>";
        echo "<br>";
    }
    else if(!isset($_COOKIE["user"])){
        echo "<h3>Hello Vistor!</h3><br>";
    }
    else if($_COOKIE["user"]=="admin"){
        echo "<button class=\"btn btn-primary\" onclick=\"window.location.href='backend/backend.php'\">Backend Admin</button>";
        echo "<button class=\"btn btn-primary\" onclick=\"window.location.href='frontend/frontend.php'\">Frontend Admin</button>";
        echo "<button class=\"btn btn-primary\" onclick=\"window.location.href='picture/AdminDocumentation.mp4'\">Admin Documentation</button>";
    }



?>

</center>
</body>
</html>