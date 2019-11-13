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
        <a href="blog.php" >Blog</a>
        <?php else: ?>
        <a href="blog.php">Blog</a>
      <?php endif; ?>
      <li style="float:right"><a href="comb.php" target ="_self">Create Outfit</a></li>
      <li style="float:right"><a href="landing.php" target ="_self">Home</a></li>
    </ul>
  </div>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>