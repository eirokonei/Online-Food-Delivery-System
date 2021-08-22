<?php
  include "connection.php";
 
?>

<!DOCTYPE html>
<html>
<head>

  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>
 

			 <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">Food Delivery System</a>
          </div>
         	<UL class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					
					
					<li><a href="login.php">Log In</a></li>
				</UL>
          </nav>
		
<section>
  <div align="center">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp &nbsp &nbsp  Online Food Ordering System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Sign Up Form</h1><br>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input  type="text" name="first" placeholder="Full Name" required=""> <br><br>
          <input  type="text" name="last" placeholder="User Name" required=""> <br><br>
         
          <input  type="password" name="password" placeholder="Password" required=""> <br><br>
           <input  type="text" name="username" placeholder="Role" required=""> <br><br>
          <input  type="text" name="email" placeholder="Email" required=""><br><br>
         

          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT UserName from `users`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['UserName']==$_POST['last'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `users` VALUES('', '$_POST[first]', '$_POST[last]', '$_POST[password]', '$_POST[username]', '$_POST[email]', NULL);");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The User Name already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>