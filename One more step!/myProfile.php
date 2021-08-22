<?php 
	include "connection.php";
	
	include "navbar.php";
		
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
 	</style>
 </head>
 <body style="background-color: #7c8a55; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="editPro.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM users where UserName='$_SESSION[name]';");
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=220 width=220 src='images/".$row['Pic']."'>
 				</div>";
 			?>
 			<div style="text-align: center;"> <b>Welcome</b>
	 			<h4>
	 				<?php echo $_SESSION['name']; ?>
	 			</h4>
 			</div>
 			<?php
 				echo "<b>";
 				//echo "<img src=images/'".$_SESSION['pic']."'>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";

	 					echo "<td>";
	 						echo "<b> User Id: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['UserId'];
	 					echo "</td>";
	 					echo "</tr>";

	 					echo "<tr>";

	 					echo "<td>";
	 						echo "<b> Full Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['FullName'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['UserName'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Role: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Role'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>