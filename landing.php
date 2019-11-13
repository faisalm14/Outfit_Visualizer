<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
 $_SESSION['msg'] = "You haven't logged in";
 //header('location: login.php');
}
if (isset($_GET['logout'])) {
 session_destroy();
 unset($_SESSION['username']);
 header("location: login.php");
}
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <title>OUTFIT VISUALIZER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="shortcut icon" href="../favicon.ico"> 
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/style1.css" />
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
  
</head>
<body id="page">
  <ul class="cb-slideshow">
    <li><span>Image 01</span><div><h3>eleg·an·t</h3><br></div></li>
    <li><span>Image 02</span><div><h3>sop·histic·ated</h3><br></div></li>
    <li><span>Image 03</span><div><h3>dapp·er</h3><br></div></li>
    <li><span>Image 04</span><div><h3>e·qua·nim·i·ty</h3><br></div></li>
    <li><span>Image 05</span><div><h3>com·po·sure</h3><br></div></li>
    <li><span>Image 06</span><div><h3>se·ren·i·ty</h3><br></div></li>
  </ul>

  <div class="container">
    <ul>
      <li><a class="active"><strong>OUTFIT VISUALIZER</strong></a></li>
      <li style="float:right">
        <?php if(isset($_SESSION['username'])): ?>
          <a href="index.php?logout='1'" >Logout</a>
          <?php else: ?>
            <a href="login.php">Login</a>
          <?php endif; ?>
      </li>
      <li style="float:right">
      <?php if(isset($_SESSION['username'])): ?>
          <a href="index.php" >Blog</a>
          <?php else: ?>
            <a href="login.php">Blog</a>
          <?php endif; ?>
        <li style="float:right"><a href="comb.php" target ="_self">Create Outfit</a></li>
      <li style="float:right"><a class="active" href="landing.php" target ="_self">Home</a></li>
    </ul>
  </div>

</body>
</html>