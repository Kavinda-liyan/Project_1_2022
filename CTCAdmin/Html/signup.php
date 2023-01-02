<?php


$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

$name ='';
$address = '';
$email = '';
$pno= '';
$password= '';




//EDIT SECTION

if( isset($_GET['getid']))
{

   $getid = $_GET['getid'];
   
   $edit = "SELECT * FROM user_register WHERE `mem-id`='$getid'";

   $result = $mysqli->query($edit);

   if($result == true)
   {
    $row = mysqli_fetch_array($result);

	  $id= $row['mem-id'];
      $name = $row['fullname'];
      $address = $row['address'];
      $email = $row['email'];
      $pno = $row['phonenumber'];
      $password= $row['password'];   

   }
   else
   {

   }

}
?> 


<!DOCTYPE html>
<html>
	<head>
		<title>edit form</title>

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/aos.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../css/signup.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="image-holder">
				<img src="../../images/signup.jpg">
			</div>
			<div class="form-inner">
				<form action="editmember.php" method="post">
					<div class="form-header">
						<h3>Edit Account</h3>
						<img src="../../images/sign-up.png" alt="" class="sign-up-icon">
					</div>
					    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>"/>

						<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Full Name" required>

						<input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="Address" required>

						<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email" required>

						<input type="number" class="form-control" name="pno" value="<?php echo $pno; ?>" placeholder="Phone Number" required>

						<input type="password" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Password" required>

					    <button type="submit" name="regbtn">Edit account</button>
					
					<p><a href="member.php">Go back</a></p>
				</form>
			</div>
			
		</div>
		
     <!-- SCRIPTS -->
     <script src="../js/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/aos.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>
	</body>
</html>