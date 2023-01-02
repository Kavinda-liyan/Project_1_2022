<?php require_once 'admincomment.php';?>
<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli)); 
?>


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
  <link href="../css/contact.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

</head>

<body style="background-color: antiquewhite;">
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
    <!--main content start-->
      <section id="main-content">
      <section class="wrapper">
<!--------------COMMENTS------------------->

            <!-- ALERT -->
            <?php
           if (isset($_SESSION['cmsg']))
           { 
                         echo'<div class="alert ';echo ($_SESSION['ctype']) ;echo '" role="alert">
                          <center>';?>  <?php echo ($_SESSION['cmsg']) ;?>
                          <?php unset ($_SESSION['cmsg']); ?> <?php echo '</center></div>';

           }?>

<section class="content-item" id="comments">
        <div class="col-lg-12 col-12 text-center mb-5">
       <h2 data-aos="fade-up" data-aos-delay="200" style="color: aliceblue;">Comments</h2>
        <h6 data-aos="fade-up"><font color=#99ffff>Add a comment</font></h6>
        </div>
        
        <div class="container-fluid">
    	<div class="row ">
           
        <div class="newcmt">
        <h6 data-aos="fade-up"><b><font color="#fff" size="4px">New Comment</font></b></h6></div>
           
             
        <div class="col-sm-12 comment-form"  data-aos="fade-up">
               <form action="admincomment.php" method="post">
               <input type="hidden" name="user" value="ADMIN">
                <textarea class="form-control" rows="3" name="commsg" placeholder="Your message" required=""></textarea>
                <button type="submit" class="btn btn-primary pull-right" name="comment">Comment</button>
                </form>
        </div>
        
        </div> 
        </div>
	
                  
                
                
      <div class="col-sm-12"> 
     <?php

     //create pagination
     $climit = 5;  
     if (isset($_GET["cpage"])) { $cpage  = $_GET["cpage"]; } else { $cpage=1; };  
     $cstart_from = ($cpage-1) * $climit;  

        //read comments in the db table
        $readcmt = "SELECT * FROM comments ORDER BY comid DESC LIMIT $cstart_from, $climit";

        $readcmtresult = mysqli_query($mysqli, $readcmt);

        if($readcmtresult)
        {
          $totcmt = "SELECT COUNT(comid) FROM comments";  
          $totres = mysqli_query($mysqli, $totcmt); 
          $totrun = mysqli_fetch_row($totres);
          $totalcmt = $totrun[0]; 

            
                  
            echo'<h3><b><font color="#b3ffb3"  size="6px" data-aos="fade-up">'.$totalcmt.' Comments</font></b></h3>';
                  
            // COMMENT - START -->
          
          while($readcmtcheck = mysqli_fetch_assoc($readcmtresult))
          {
            $cmtdate= $readcmtcheck['comdate'];

            if($cmtdate) 
            {
              $cmtdate = date("F d, Y, g:i a", strtotime($cmtdate));
            } 
            else 
            {
                $cmtdate = '';
            }

     
            
               echo'  <div class="media"  data-aos="fade-up" style="background-color: white; color:white;">
                      <img class="media-object pull-left" src="../../images/comment.png" alt="">
                      <div class="media-body" style="color:white;">
                          <h4 class="media-heading">'.$readcmtcheck["member"].'</h4>
                          <p>'.$readcmtcheck["comment"].'</p>
                          <p class="datecmt"><i class="fa fa-calendar"></i> &nbsp; '.$cmtdate.'</p>               
                      </div>
                  </div>';
                  
          }
        }
        else
        {
          echo "error";
        }
                // COMMENT  - END --> ?>



                
            </div>
        
                   <?php
                    //pagination show code -->
                  
                    $readcmt = "SELECT COUNT(comid) FROM comments";  
                    $readcmtresult = mysqli_query($mysqli, $readcmt); 
                    $readcmtcheck = mysqli_fetch_row($readcmtresult);  
                    $ctotal_records = $readcmtcheck[0];  
                    $ctotal_pages = ceil($ctotal_records / $climit);  
                    echo "<nav><ul class='pagination'>";  
                    for ($i=1; $i<=$ctotal_pages; $i++) {  
                                 echo "<li><a href='contact.php?cpage=".$i."#comments'>".$i."</a></li>";  
                    };  
                    echo "</ul></nav>";   
                    ?>
            </div>
</section>
    <!--main content end-->
      </section>
      </section>

      
       
        
         
           <!--footer start-->
    <footer class="footer" style="background-color: black;">
      <div class="text-center">
        <p>
          &copy;2022 Copyrights <strong>CRYSTAL TECH COMPUTERS</strong>.ProjectCconcept All Rights Reserved
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
