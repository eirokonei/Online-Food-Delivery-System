<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_delivery_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

$searchsql='Select * from products order by p_id asc';
$product_ids=array();


	
		if(!isset($_SESSION['email']))
		{
			echo "<script>alert('You are not logged in');</script>";
			header("refresh:1;url=login.php");			
		}
	

if(isset($_GET['searchbtn']))
{	
	$val = $_GET['searchval'];
	$searchsql="SELECT * FROM `products` WHERE `name` LIKE '%$val%' ORDER BY `p_id` ASC";

}
if(isset($_GET['category']))
{
	$val=$_GET['category'];
	$searchsql="SELECT * FROM `products` WHERE `categories` LIKE '%$val%' ORDER BY `p_id` ASC";

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Online Food Delivery System</title>
	<link type="text/css" rel="stylesheet"  href="menu.css">
</head>

<body>
	<div class="main"> 
		<nav>
			<img class="logo" src="banner_1.jpg"width="250"hieght="250">
			<UL>
				<li><a href="index.php">Home</a></li>
				<li><a href="adminDash.php">Dashboard</a></li>
				
				<?php if(isset($_SESSION['email'])){
						
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
	
	<div class="bodycontent">
		<div class="sidebar">
			<nav class="horizontal">
				<p class="header">Categories</p>	
				<UL>
					<li><a href="menu.php?category=fastfood">Fast Food</a></li>
					<li><a href="menu.php?category=meal">Set Menu</a></li>
					<li><a href="menu.php?category=desert">Desert</a></li>
					<li><a href="menu.php?category=beverage">Beverage</a></li>
				</UL>
			</nav>
		</div>
		
		<div class="content">
			 <div class="box search">
				<p>
					<form method="GET" action="">
						<input type="text" name="searchval" placeholder="Search for food items">
						<button class="searchbtn" name="searchbtn" >Search</button>
					</form>
				</p>
			</div>

			<?php 
				
				$query = $searchsql;
				$result=mysqli_query($conn,$query);
				
				if($result)
				{
					if(mysqli_num_rows($result)>0)
					{
						while($products=mysqli_fetch_assoc($result))
						{
							?>
							
							<div class="box box2"> <img class="product" src="images/<?php echo $products['images']; ?>"
								width="200" hieght="200">
								<p style="font-weight: bold; margin-left: 20px;font-size: 20px;"><?php echo $products['name']; ?></p>
								<p class="price">Price: <?php echo $products['price']; ?>/=</p>
								<p class="price">Quantity: <?php echo $products['quantity']; ?></p>
								

							</div>
							<?php
						}
					}	
				}

			 ?>
			
		</div>
		

		</div>
	
</body>
</html>