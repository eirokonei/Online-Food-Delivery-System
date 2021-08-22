<?php
	
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body style="background-color: #7c8a55;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM users WHERE UserName='$_SESSION[name]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$userId=$row['UserId'];
			$fullName=$row['FullName'];
			$userName=$row['UserName'];
			$password=$row['Password'];
			$role=$row['Role'];
			$email=$row['Email'];
			$img=$row['Pic'];
			
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome </span>	
		<h4 style="color: white;"><?php echo $_SESSION['name']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<input class="form-control" type="file" name="file">

		<label><h4><b>Full Name: </b></h4></label>
		<input class="form-control" type="text" name="fullName" value="<?php echo $fullName;?>">

		<label><h4><b>User Name</b></h4></label>
		<input class="form-control" type="text" readonly name="userName" value="<?php echo $userName; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

		<label><h4><b>Role</b></h4></label>
		<input class="form-control" type="text" readonly name="role" value="<?php echo $role; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">


		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$fullName=$_POST['fullName'];
			$userName=$_POST['userName'];
			$password=$_POST['password'];
			$role=$_POST['role'];
			$email=$_POST['email'];
			$pic=$_FILES['file']['name'];

			if($pic=="")
			{
				$sql1= "UPDATE users SET pic='$img', FullName='$fullName', UserName='$userName', Password='$password', Role='$role', Email='$email' WHERE UserName='".$_SESSION['name']."';";
				if(mysqli_query($db,$sql1))
					{
						?>
						<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="myProfile.php";
						</script>
						<?php
					}

			}
			else
			{
				$sql1= "UPDATE users SET pic='$pic', FullName='$fullName', UserName='$userName', Password='$password', Role='$role', Email='$email' WHERE UserName='".$_SESSION['name']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="myProfile.php";
					</script>
				<?php
			}

			}

		}
 	?>
</body>
</html>

