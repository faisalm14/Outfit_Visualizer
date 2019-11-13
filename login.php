<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body style="background-image: url(images/bg3.jpg);">
  <div class="container">
    <ul>
      <li><a class="active"><strong>OUTFIT VISUALIZER</strong></a></li>
      <li style="float:right"><a class="active" href="login.php">Login</a></li>
      <li style="float:right">
      <?php if(isset($_SESSION['username'])): ?>
        <a href="blog.php" >Profile</a>
        <?php else: ?>
        <a href="login.php">Profile</a>
      <?php endif; ?>
      <li style="float:right"><a href="comb.php" target ="_self">Create Outfit</a></li>
      <li style="float:right"><a href="landing.php" target ="_self">Home</a></li>
    </ul>
  </div>

  <div class="header">
  	<h2>Login</h2>
  </div>
	<!-- <div id="bg">
    <img src="images/bg3.jpg">
  </div> -->
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>