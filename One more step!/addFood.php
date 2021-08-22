<?php 
	include "connection.php";
	include "navbarAdmin.php";
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Add Food</title>
 </head>
 <body>
 <div class="section layout_padding padding_bottom-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="heading_main text_align_center">
                        <h2><span>Add Food</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="heading_main text_align_center">

        <div class="container">
           

        <input type="text" name="name"  placeholder="Set Food Name" required=""><br><br>
        <input type="text" name="price"  placeholder="Set Price" required=""><br><br>
        <input type="text" name="categoires"  placeholder="Set Categoires" required=""><br>
        <br>
		<input type="text" name="quantity"  placeholder="Set Quantity" required=""><br><br>
		<div align="center"><input class="form-control" type="file" name="file"></div><br><br>
        <input type="submit" value="Save" class="btn btn-default" name="submit" /><br><br>

   		</div>
   	</div>	
</div>
</form>
<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['name']))
      {
      	move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);
      	$pic=$_FILES['file']['name'];

        mysqli_query($db,"INSERT INTO products VALUES (NULL,'$_POST[name]', '$_POST[price]', '$_POST[categoires]', '$pic', 'availabe', '$_POST[quantity]') ;");
     
        ?>
          <script type="text/javascript">
            alert("Food Added Successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>
 </body>
 </html>