<?php
session_start();

if(isset($_SESSION['email'])){
	echo "<script>alert('You are alredy logged in');</script>";
	header("refresh:2;url=welcome.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_delivery_system";


$conn = new mysqli($servername, $username, $password, $dbname);

$error="";
$success="";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['Login']))
{		
	if($_POST['email']=="admin@gmail.com"&&$_POST['password']="pass")
	{
			$success="welcome admin";
			header("refresh:2;url=signup.php");

	}
	elseif($_POST['email']=="mirza@gmail.com" && $_POST['password']="mirza"){
		header("location: welcome.php");
	}
	else{


		$email=$_POST['email'];
		$password=$_POST['password'];
		$password=stripcslashes($password);
		$email=stripcslashes($email);

		$res = mysqli_query($conn,"SELECT * FROM `users` WHERE `UserName` = '".$email."'");

		$num = mysqli_num_rows($res);

		if($num == 0){

		$error="Invalid User Name";
		$success="";

		}
		else{

		$res = mysqli_query($conn,"SELECT * FROM `users` WHERE `UserName` = '".$email."' AND `Password` = '".$password."'");
		$row=mysqli_fetch_array($res,MYSQLI_ASSOC);

		$num = mysqli_num_rows($res);

			if($num == 0){

			$error="Invalid Password";
			$success="";
			}
			else if($row['Role']=="Customer")
			{
				$error="";	
				$success="Welcome ".$row['UserName'];
				
				$_SESSION['name']=$row['UserName'];
				$_SESSION['email']=$row['Email'];
				$_SESSION['m_id']=$row['UserId'];
				$_SESSION['role']=$row['Role'];
				$_SESSION['pic']=$row['Pic'];
				$_SESSION['memberdetails']=$row;
				header("refresh:2;url=welcome.php");
			}
			else if($row['Role']=="Admin")
			{
				$error="";	
				$success="Welcome ".$row['UserName'];
				
				$_SESSION['name']=$row['UserName'];
				$_SESSION['email']=$row['Email'];
				$_SESSION['m_id']=$row['UserId'];
				$_SESSION['role']=$row['Role'];
				$_SESSION['pic']=$row['Pic'];
				$_SESSION['memberdetails']=$row;
				header("refresh:2;url=adminDash.php");
			}
			else{
				$error="";	
				$success="Welcome ".$row['UserName'];
				
				$_SESSION['name']=$row['UserName'];
				$_SESSION['email']=$row['Email'];
				$_SESSION['m_id']=$row['UserId'];
				$_SESSION['role']=$row['Role'];
				$_SESSION['pic']=$row['Pic'];
				$_SESSION['memberdetails']=$row;
				header("refresh:2;url=managerDash.php");
			}
		}
	}
	
		
	
	$conn->close();
}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>FOOD DELIVERY</title>
	<link type="text/css" rel="stylesheet"  href="login.css">
</head>
<script type="text/javascript"></script>
	<body>
		<div class="main"> 
			<nav>
				<img src="banner_1.jpg"width="150"hieght="150">
				<UL>
					<li><a href="index.php">Home</a></li>
					
					
					<li><a href="SignUp.php">Sign Up</a></li>
				</UL>
			</nav>
		</div>
		<div class="welcome">
			<div class="panel">
				
				<p><span class="bfont">Food Delivery  <span class="cyan"></span></span></p>
				
				<form  action="" method="post">
					<p class="small id">User Name</p>
					<input type="text" name="email" class="input" placeholder="Enter User Name" required>
					<p class="small id">Password</p>
					<input type="password" name="password" class="input" placeholder="Enter Password" required><br>
					<br><center><button name="Login" style="margin-left: 0px";>Log In</button></center>
				</form>
				<p><span style='color:#e84118; font-size: 20px;'><?php echo $error; ?></span> </p>
				<p><span style='color:#44bd32; font-size: 20px;'><?php echo $success; ?></span> </p>
			</div>
		</div>
	</body>
</html>