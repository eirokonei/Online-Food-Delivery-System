<!DOCTYPE html>
<html>
<head>
	<title>Online food delivery</title>
	<link type="text/css" rel="stylesheet"  href="welcome.css">

</head>

<body>
	<div class="main"> 
		<nav>
			<img src="home.png"width="150" height="150">
			
			<UL>
				<li><a href="welcome.php">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="profile.php">Purchases</a></li>
				<li><a href="myProfile.php">My Profile</a></li>
				
				<?php 
					session_start();
					if(isset($_SESSION['email'])){
						
						echo "
							<li><a href=".'"logout.php">Log Out'."</a></li>
						</UL>";
	
						
					}
					else{
					echo "<li><a href=".'"login.php">Login'."</a></li>
						</UL>";

					 	
					}
				?>
		</nav>
	</div>
	<div class="welcome">
		<div class="panel">
			<p><span >Welcome to</span></p>
			<p><span class="bfont"> <span class="cyan">Food delivery system</span></span></p>
			<p class="small">Current Token : 1012
			<br>Estimated Wait time : 2 Min 
			</p>
		</div>
		
	</div>
	<!-- <div>
	   <button><a href="op.php">Show all order_products</a></button>
	   <br><br>
	   <button><a href="order.php">show orders</a></button>
	   <br><br>
	   <button><a href="product.php">Show all products</a></button>
	</div> -->
</body>
</html>
