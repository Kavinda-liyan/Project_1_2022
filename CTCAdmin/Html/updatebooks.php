<?php


$mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli)); 

$pid ='item_id';
$category = 'category';
$name = 'names';
$sdiscription= 'sdiscription';
$price= 'price';
$dprice= 'dprice';
$quantity= 'quantity';
$cover= 'cover';
//EDIT SECTION

if( isset($_GET['edit']))
{

   $pid = $_GET['edit'];
   
   $edit = "SELECT * FROM itemproducts WHERE item_id='$pid'";

   $result = $mysqli->query($edit);

   if($result == true)
   {
    $row = mysqli_fetch_array($result);


      $pid = $row['item_id'];
      $category = $row['category'];
      $name = $row['names'];
      $sdiscription= $row['sdiscription'];
      $price= $row['price'];
      $dprice= $row['dprice'];
      $quantity = $row['quantity'];
      $cover = $row['cover'];
      
      

   }
   else
   {

   }

}
?>     
<!------Adding collect.php------->
<?php require_once 'update.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CTC Admin Panel</title>


  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/updatebooks.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

</head>

<body>
  <section id="container">
    <!-- TOP BAR CONTENT & NOTIFICATIONS -->
    
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="../Dashboard.php" class="logo"><b>CRYSTAL<span style="color: red;">TECH COMPUTTERS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../index.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="../Images/loginlogo.png" class="img-rounded" width="80"></p>
          <h5 class="centered">Hello Admin</h5>
          <li class="mt">
            <a class="sub-menu" href="../Dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Products</span>
              </a>
            
              <li><a href="additems.php">Add Items</a></li>
              
              <li><a href="allitems.php">Update Items</a></li>
            
          </li>
          
          <li class="sub-menu">
            <a href="pending.php">
              <i class="fa fa-archive"></i>
              <span>Pending Orders</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="faq.php">
              <i class="fa fa-bookmark"></i>
              <span>FAQ</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="member.php">
              <i class="fa fa-th"></i>
              <span>Member Details</span>
              </a>
          </li>
          <li>
          <a href="contact.php">
              <i class="fa fa-envelope"></i>
              <span>Comments </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
          

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
            <!--main content start-->
        <section id="main-content">
        <section class="wrapper">
      <!----------Show ALert Message------------>
              <section id="lms">         
                 <div class="container"> 

                 <?php
                 if (isset($_SESSION['message']))
                 { 
                 echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
                  <center>';?>  <?php echo ($_SESSION['message']) ;?>
                  <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';

                 }?>
                
              
                 </div>
                </section>

      <!---------ALert-------------->
      
      
        <div class="container">
			<div class="main">
				<div class="main-center">
				<h3>Update Item</h3>
          <form method="post" action="update.php" enctype="multipart/form-data">
          
				<input type="hidden" class="form-control" name="id" value="<?php echo $pid; ?>"/>
						
						
        <!-- <div class="form-group">
							<label>Item Category</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
									<select class="form-control" name="category" required>
                  <option>Choose Item Category</option>
                  
                  <?php

                  $mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli)); 
                  //get category
                  $getcategory = "SELECT * FROM category";
                  $getcat_query = mysqli_query($mysqli, $getcategory);

                  while($row = mysqli_fetch_assoc($getcat_query))
                  {
                    $category = $row["category"];

                    echo'<option value="'.$category.'">'.$category.'</option>';
                  }
                  ?>
                                    
                                   </select>
								</div>
            </div> -->

						<div class="form-group">
							<label>Item Name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $name; ?>" name="name" placeholder="Enter Item Name" required/>
							</div>
						</div>

						
            
           
            <div class="form-group">
							<label>Discription</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-upload"></i></span>
									<input type="text" class="form-control" value="<?php echo $sdiscription; ?>" name="sdiscription" placeholder="Discription" required/>
								</div>
            </div>
            
            <div class="form-group">
							<label>Price</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-file"></i></span>
									<input type="number" class="form-control" value="<?php echo $price; ?>" name="price" placeholder="Enter Price" required/>
								</div>
						</div>

						<div class="form-group">
							<label>Discounted Price</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
									<input type="number" class="form-control" value="<?php echo $dprice; ?>" name="dprice" placeholder="Enter Discounted Price" required/>
								</div>
						</div>
            
            <div class="form-group">
							<label>Quantity</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
									<input type="number" class="form-control" value="<?php echo $quantity; ?>" name="quantity" placeholder="Enter Quantity" required/>
								</div>
						</div>
						
						<div class="form-group">
							<label>Item Cover</label>
								<div class="input-group">
								    <span class="input-group-addon"></span>
									<input type="file" class="form-control" name="cover" >
								</div>
						</div>
						
						
						

				<button type="submit" name="update">Update</button>
                    
     
						
          </form>
          
				</div><!--main-center"-->
			</div><!--main-->
    </div><!--container-->
    
        </section>
        </section>

      
       
        
         
           <!--footer start-->
    <footer class="footer" style="color: white; background-color: black;">
      <div class="text-center">
        <p>
          &copy;2022 Copyrights <strong>Crystal Tech Computers</strong>.ProjectCconcept All Rights Reserved
        </p>
      </div>
    </footer>
    <!--footer end-->
  </section>
  
  
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>

</body>

</html>
