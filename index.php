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
<body>
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
      <li style="float:right"><a class="active" href="index.php">Blog</a></li>
      <li style="float:right"><a href="comb.php" target ="_self">Create Outfit</a></li>
      <li style="float:right"><a href="landing.php" target ="_self">Home</a></li>
    </ul>
  </div>
<?php 
$db = mysqli_connect('localhost', 'root', '', 'outfit_v');
echo "<h1> value of string is :</h1>";
$s = $_GET['res'];
echo "img src - ".$_GET['res']."<br>";
$user_check_query = "SELECT * FROM outfits WHERE path='$s'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
echo $user['tags'];
header( "refresh:5;url=http://www.myntra.com/men-".$user['tags'] );
?>

<!-- $user_check_query = "SELECT tags FROM outfits WHERE path='$s'";
echo $user_check_query;
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
 -->



        <div class="header">
         <h2>Home Page</h2>
       </div>
       <div class="content">
         <!-- notification message -->
         <?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
           <h3>
            <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
            ?>
          </h3>
        </div>
      <?php endif ?>

      <!-- logged in user information -->
      <?php  if (isset($_SESSION['username'])) : ?>
       <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
       <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
     <?php endif ?>
   </div>

 </body>
 </html>