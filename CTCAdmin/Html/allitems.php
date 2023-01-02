<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli)); 

 $query = 'SELECT * FROM itemproducts i JOIN category c ON i.category=c.cat_id ';
 
$book = mysqli_query($mysqli, $query); 

$right = $mysqli->query($query);

 ?>

<!------Adding collect.php------->
<?php require_once 'item.php'; ?> 



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
  <link href="../css/allbooks.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
    <!------Data Tables--------------->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../../js/sweetalert2.all.min.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

</head>

<body >
  <section id="container">
    <!-- TOP BAR CONTENT & NOTIFICATIONS -->
    
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="../Dashboard.php" class="logo"><b>CRYSTAL<span style="color: red;">TECH COMPUTERS</span></b></a>
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
            
              <li><a href="additems.php"><i class="fa fa-plus"></i><span> Add Items</span></a></li>
              <li><a href="view.php"><i class="fa fa-eye"></i><span> View Items</span></a></li>
              <li><a href="allitems.php"><i class="fa fa-arrow-up"></i><span> Update Items</span></a></li>
            
          </li>
          
          <li class="sub-menu">
            <a href="pending.php">
              <i class="fa fa-archive"></i>
              <span>Pending Orders</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="faq.php">
              <i class="fa fa-question-circle"></i>
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
        
        <section id="lms">



              <!----------Show ALert Message------------>
              <?php
              if (isset($_SESSION['message']))
              { 
              echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
                <center>';?>  <?php echo ($_SESSION['message']) ;?>
              <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';

              }?>

              
                  <?php
                    if (isset($_GET['itemdel']))
                    { 
                   echo '<div class="flash-data" data-flashdata="'.$_GET["itemdel"].'" ></div>';

                    }?>

                               <!-- <script>    
                                if(typeof window.history.pushState == "function") {
                                window.history.pushState({}, "Hide", "allitems.php");
                                }
                                </script> -->


<div class="container-fluid" style="background-color: #31313148;"><h3 align="center"><font color="#fff"><b>Product Details</b></font></h3> </div>
                
                
                <br /> 
                <!---------insert data into RETURN table------------>

                <div class="table-responsive">  
                  <table id="issue_data" class="table table-striped table-bordered" border=1>  
                  <thead>  
                  <tr>
                      <td ><b>Item Cover</b></td>	  
                      <td>Brand</td>  
                      <td>Product Category</td>  
                      <td>Product Name</td>  
                      <td>Discription</td>
                      <td>Price</td>
                      <td>Discounted Price</td> 
                      <td>Quantity</td>
                      <td>Edit</td>
                      <td>Delete</td>    
                  </tr>  
                  </thead> 
                 <?php
                          while ($row = mysqli_fetch_array($book))  
                          {  
                               echo '  
                               <tr>
                                    <td><img src="../upload/'.$row["cover"].'" width="83" height="100"></td> 
                                    <td>'.$row["brand"].'</td>
                                    <td>'.$row["category"].'</td>  
                                    <td>'.$row["names"].'</td>  
                                    <td>'.$row["sdiscription"].'</td>  
                                    <td>'.$row["price"].'</td>
                                    <td>'.$row["dprice"].'</td>
                                    <td>'.$row["quantity"].'</td>
                                    <td><center><a href="updatebooks.php?edit='.$row["item_id"].'" class="btn btn-primary">Edit</a></center></td>
                                    <td><center><a href="item.php?del='.$row["item_id"].'" class="btn btn-warning">Delete</a></center></td>
                                    
                                    
                               </tr>  
                               ';  
                               
                          }  
                          ?>
                           </table>  
                           </div>  
                        
                

           

                   <!------------- sweet alert for news cancel --------------->
     <script>
    $('.btn-danger').on('click',function(e){
                   
    e.preventDefault();
    const href = $(this).attr('href')
           
           Swal.fire({
               title : 'Are You Sure?',
               text : 'This record will be deleted',
                icon: 'warning',
               showCancelButton : true,
               confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
               confirmButtonText : 'Delete',
           }).then((result) => {
               if (result.value){
                   document.location.href = href;
               }
           })
       })

    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata)
    {
       Swal.fire(
                'Record Deleted',
                'Record has been deleted',
                'success'
                )
    }
    </script>

      </section>
  
    </section>
    </section>
    <!--main content end-->

      
       
        
         
           <!--footer start-->
    <footer class="footer" style="background-color: black;">
      <div class="text-center">
        <p style="color: white;">
          &copy;2022 Copyrights <strong>CRYSTAL TECH COMPUTERS</strong>. All Rights Reserved
        </p>
      </div>
    </footer>
    <!--footer end-->
  </section>
  

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>


  <script>  
 $(document).ready(function(){  
      $('#issue_data').DataTable();  
 });  
 </script>

</body>

</html>
