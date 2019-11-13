<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
 $_SESSION['msg'] = "You must log in first";
 header('location: login.php');
}
if (isset($_GET['logout'])) {
 session_destroy();
 unset($_SESSION['username']);
 header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body style="background-image: url(images/bg3.jpg);">
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
      <li style="float:right"><a class="active" href="blog.php">Profile</a></li>
      <li style="float:right"><a href="comb.php" target ="_self">Create Outfit</a></li>
      <li style="float:right"><a href="landing.php" target ="_self">Home</a></li>
    </ul>
  </div>
<?php 
$db = mysqli_connect('localhost', 'root', '', 'outfit_v');
$s = $_GET['res'];
$user_check_query = "SELECT * FROM outfits WHERE path='$s'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

header( "refresh:5;url=http://www.myntra.com/men-".$user['tags'] );
?>
    <div class="header">
     <h2>BUY SIMILAR</h2>
   </div>
   <div class="content">
     <?php
     echo "<h3> You selected an image :<br>Searching for similar options with tags </h3>";
     echo $user['tags']; ?>
   </div>

 </body>
 </html>