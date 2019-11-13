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

<html>
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	 <script>
    var l1,l2,l3;
    function myFunction1(imgs) {
      var expandImg = document.getElementById("expandedImg1");
      expandImg.src = imgs.src;
      l1 = document.getElementById("expandedImg1").getAttribute('src');
      expandImg.parentElement.style.display = "block";
    }
    function myFunction2(imgs) {
      var expandImg = document.getElementById("expandedImg2");
      expandImg.src = imgs.src;
      l2 = imgs.src;
      expandImg.parentElement.style.display = "block";
    }
    function myFunction3(imgs) {
      var expandImg = document.getElementById("expandedImg3");
      expandImg.src = imgs.src;
      l3 = imgs.src;
      expandImg.parentElement.style.display = "block";
    }
    
    function buy1()
    {
     // document.write (l1);
      var str = l1;
      var res = str.substring(24, str.length);
      window.open ("http://localhost/wtproj/index.php?res=" + res, '_blank');
      //document.write(res);
    }
    function buy2()
    {
     // document.write (l1);
      var str = l2;
      var res = str.substring(24, str.length);
      window.open("http://localhost/wtproj/buy.php?res=" + res, '_blank');
      //document.write(res);
    }
    function buy3()
    {
     // document.write (l1);
      var str = l3;
      var res = str.substring(24, str.length);
      window.open("http://localhost/wtproj/buy.php?res=" + res, '_blank');
      //document.write(res);
    }
    //   var try1 = document.getElementById("expandedImg1").getAttribute("src");
    //   windows.alert("try1");
    //   console.log("try1");
    
  </script>



  <style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
      display: block;
      font-size: 18px;
      color: white;
      text-align: center;
      padding: 10px 10px;
      text-decoration: none;    }

      li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      li a:hover:not(.active) {
        background-color: #111;
      }

      .active {
        background-color: #4CAF50;
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        font-family: Arial;
        
      }
      .row {
        float :left;
        width: 70%;
        height: 250px;
      }
      /* The grid: Four equal columns that floats next to each other */
      .column {
        float: left;
        width: 12.5%;
        padding: 10px;
      }

      /* Style the images inside the grid */
      .column img {
        opacity: 0.8; 
        cursor: pointer; 
      }

      .column img:hover {
        opacity: 1;
      }

      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }

      /* The expanding image container */
      .container1 {
        float: right;
        position: relative;
        display: none;
        width: 30%;
        height: 250px;
        object-fit: contain;
      }
      .container2 {
        float: right;
        position: relative;
        display: none;
        width: 30%;
        height: 250px;
        object-fit: contain;
      }

      /* Closable button inside the expanded image */
      .closebtn {
        position: absolute;
        top: 10px;
        left: 15px;
        color: white;
        font-size: 35px;
        cursor: pointer;
      }
      img {
        width: 100%;
        height: 100%;
        object-fit: contain;
      }
/*making di button stick to bottom */
/*.fixed-footer{
        width: 100%;
        position: fixed;        
        background: #333;
        padding: 10px 0;
        color: #fff;
    }
    .fixed-footer{
        bottom: 0;
    }
*//*    .responsive {
      width: 100%;
      max-width: 400px;
      height: auto;
    }
    */  
  </style>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <title>OUTFIT VISUALIZER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="shortcut icon" href="../favicon.ico"> 
  <!-- <link rel="stylesheet" type="text/css" href="css/demo.css" />
   --><!-- <link rel="stylesheet" type="text/css" href="css/style1.css" />
   --><script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

</head>

<body>
 <ul>
  <li><a class="active">OUTFIT VISUALIZER</a></li>
  <li style="float:right">
    <?php if(isset($_SESSION['username'])): ?>
    <a href="index.php?logout='1'" >Logout</a>
    <?php else: ?>
    <a href="login.php">Login</a>
    <?php endif; ?>
  </li>
  <li style="float:right">
    <?php if(isset($_SESSION['username'])): ?>
    <a href="blog.php" >Blog</a>
    <?php else: ?>
    <a href="login.php">Blog</a>
  <?php endif; ?>
  <li style="float:right"><a class="active" href="comb.php" target ="_self">Create Outfit</a></li>
  <li style="float:right"><a href="landing.php" target ="_self">Home</a></li>
</ul>


<div class = "row">
  <p style="text-align: left color : yellow"><h3>Select Top</h3></p>
    <div align="right"><button class="w3-button w3-small w3-white w3-round-xxlarge" onclick="buy1()">Buy Similar</button></div>
  <div class = "scrolling-wrapper">
<!-- <?php 
$result = $_GET['res'];
//echo $result;
?> -->

    <?php
    $imagesDirectory = "images/Top/";
    if (is_dir($imagesDirectory))
    {
      $opendirectory = opendir($imagesDirectory);
      $x = 0;
      while (($image = readdir($opendirectory)) !== false)
      {
        if(($image == '.') || ($image == '..'))
        {
          continue;
        }

        $imgFileType = pathinfo($image,PATHINFO_EXTENSION);

        if(($imgFileType == 'jpg') || ($imgFileType == 'png') || ($imgFileType == 'jpeg'))
        {
          echo "<div class ='column'><img id='$x' src='images/Top/".$image."' width='100%'  onclick='myFunction1(this)'>
          </div> ";
        }

        $x++;
      }
      closedir($opendirectory);
    }
    ?>
  </div>
</div>
<div class="container1">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg1" style="width:35% height:100%">

</div>
<div class = "row">
  <p><h2>Select Bottom</h2></p>
  <div align="right"><button class="w3-button w3-small w3-white w3-round-xxlarge" onclick="buy2()">Buy Similar</button></div>
  <div class = "scrolling-wrapper">
    <?php
    $imagesDirectory = "images/Bottom/";
    if (is_dir($imagesDirectory))
    {
      $opendirectory = opendir($imagesDirectory);
      $x = 0;
      while (($image = readdir($opendirectory)) !== false)
      {
        if(($image == '.') || ($image == '..'))
        {
          continue;
        }

        $imgFileType = pathinfo($image,PATHINFO_EXTENSION);

        if(($imgFileType == 'jpg') || ($imgFileType == 'png') || ($imgFileType == 'jpeg'))
        {
          echo "<div class ='column'><img id='$x' src='images/Bottom/".$image."' width='100%'  onclick='myFunction2(this)'>
          </div> ";
        }

        $x++;
      }
      closedir($opendirectory);
    }
    ?>
  </div>
</div>
<div class="container2">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg2" style="width:35% height:100%">
</div>
<div class = "row">
  <p><h2>Select Shoes</h2></p>
  <div align="right"><button class="w3-button w3-small w3-white w3-round-xxlarge" onclick="buy3()">Buy Similar</button></div>
  <div class = "scrolling-wrapper">
    <?php
    $imagesDirectory = "images/Shoes/";
    if (is_dir($imagesDirectory))
    {
      $opendirectory = opendir($imagesDirectory);
      $x = 0;
      while (($image = readdir($opendirectory)) !== false)
      {
        if(($image == '.') || ($image == '..'))
        {
          continue;
        }

        $imgFileType = pathinfo($image,PATHINFO_EXTENSION);

        if(($imgFileType == 'jpg') || ($imgFileType == 'png') || ($imgFileType == 'jpeg'))
        {
          echo "<div class ='column'><img id='$x' src='images/Shoes/".$image."' width='100%'  onclick='myFunction3(this)'>
          </div> ";
        }

        $x++;
      }
      closedir($opendirectory);
    }
    ?>
  </div>
</div>
<div class="container2">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg3" style="width:35% height:100%">
</div>
<br>
<!-- <div class="fixed-footer">
<button class="w3-button w3-black w3-round-xxlarge">Round XXLarge</button>
</div> -->
</body>
</html>
