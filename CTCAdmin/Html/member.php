<?php

  $mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli)); 

  $result = $mysqli->query("SELECT * FROM userreg") or die($mysqli->error);

?>

<!------Adding collect.php------->
<?php require_once 'memberdelete.php'; ?>

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
  <link href="../css/member.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <link href="../css/table-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
  
    <!------Data Tables--------------->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../../js/sweetalert2.all.min.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

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
      <div class="top-menu" style="background-color: red;">
        <ul class="nav pull-right top-menu" >
          <li ><a class="logout" href="logout.php" style="background-color: red; font-weight: bold;">Logout</a></li>
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
              </li>
              <li><a href="additems.php"><i class="fa fa-plus"></i><span> Add Items</span></a></li>
              <li><a href="view.php"><i class="fa fa-eye"></i><span> View Items</span></a></li>
              <li><a href="allitems.php"><i class="fa fa-arrow-up"></i><span> Update Items</span></a></li>
              
            
          
          
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
       
     <section id="lms">
           <div class="container">
             
          <?php
           if (isset($_SESSION['message']))
           { 
          echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
            <center>';?>  <?php echo ($_SESSION['message']) ;?>
          <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';}?>

                   <?php
                    if (isset($_GET['memdel']))
                    { 
                   echo '<div class="flash-data" data-flashdata="'.$_GET["memdel"].'" ></div>';
                   echo'<script>    
                        if(typeof window.history.pushState == "function") {
                        window.history.pushState({}, "Hide", "member.php");
                        }
                        </script>';
                    }?> 



          
                <h3 align="center">Member Details</h3>  
                <br />  
                
                
                <div class="container">
                <div class="container px-5 mx-2">
                <div class="table-responsive center" align="center">  
                     <table id="issue_data" class="table table-striped table-bordered " >  
                          <thead>  
                               <tr>  
                               <td>UserID</td>
                               <td>User Name</td>
                               <td>Address</td> 
                               <td>Email</td>
                               <td>PhoneNumber</td>
                               <td>NIC Number</td>                 
                               <td>Delete</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while ($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["id"].'</td>  
                                    <td>'.$row["userName"].'</td>  
                                    <td>'.$row["useraddress"].'</td>  
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["phoneNumber"].'</td>
                                    <td>'.$row["nicNumber"].'</td>
                                    <td><center><a href="memberdelete.php?delete='.$row["id"].'" class="btn btn-danger">Delete</a></center></td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>
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
        
         
           <!--footer start-->
    <footer class="footer">
      <div class="text-center">
        <p>
          &copy;2022 Copyrights <strong>CRYSTAL TECH COMPUTERS</strong>. ProjectCconcept All Rights Reserved
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
