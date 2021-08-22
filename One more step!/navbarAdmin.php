<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>
  </title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

    <link rel="stylesheet" href="bootstrap/css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="bootstrap/css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="bootstrap/css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="bootstrap/css/custom.css" />


</head>
<body>

      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">Food Delivery System</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            
            <li><a href="usersDetails.php">USER INFO</a></li>
            <li><a href="menuAdmin.php">MENU</a></li>
            <li><a href="addFood.php">ADD FOOD</a></li>
          </ul>
          <?php
            if(isset($_SESSION['name']))
            {

          ?>
                <ul class="nav navbar-nav">
                  <li><a href="myprofileAdmin.php">PROFILE</a></li>
                 

                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="">
                    <div style="color: white">
                      <?php
                           $q=mysqli_query($db,"SELECT * FROM users where UserName='$_SESSION[name]';");
                           $row=mysqli_fetch_assoc($q);
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$row['Pic']."'>";
                        echo " ".$_SESSION['name']; 
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
              </ul>
                <?php
            }
          ?>

      </div>
    </nav>
  
</body>
</html>