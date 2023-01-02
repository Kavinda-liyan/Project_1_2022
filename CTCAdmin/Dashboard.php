<?php require_once 'Html/news.php'?> 
<?php require_once 'Html/newscancel.php'?> 
<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli)); 

if(!isset($_SESSION['LoggedUser']))
{
  header("location:index.html");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CTC Admin Panel</title>

  <!-- Favicons -->
  <link href="Images/loginlogo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
 
  <link href="css/dashboard.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="css/javascript-calendar.css" type="text/css">
  <script src="lib/chart-master/Chart.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
    <!------Data Tables--------------->
    <script src="lib/jquery/jquery.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/sweetalert2.all.min.js"></script>
  <script src="../js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">

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
      <a href="Dashboard.php" class="logo"><b>CRYSTAL<span>TECH COMPUTERS</span></b></a>
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
          <li ><a class="logout" href="html/logout.php" style="background-color: red; font-weight: bold;">Logout</a></li>
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
          <p class="centered"><img src="Images/loginlogo.png" class="img-rounded" width="80"></p>
          <h5 class="centered">Hello Admin</h5>
          <li class="mt">
            <a class="sub-menu" href="Dashboard.php">
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
              <li><a href="Html/additems.php"><i class="fa fa-plus"></i><span> Add Items</span></a></li>
              <li><a href="Html/view.php"><i class="fa fa-eye"></i><span> View Items</span></a></li>
              <li><a href="Html/allitems.php"><i class="fa fa-arrow-up"></i><span> Update Items</span></a></li>
              
            
          
          
          <li class="sub-menu">
            <a href="Html/pending.php">
              <i class="fa fa-archive"></i>
              <span>Pending Orders</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="html/faq.php">
              <i class="fa fa-question-circle"></i>
              <span>FAQ</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="Html/member.php">
              <i class="fa fa-th"></i>
              <span>Member Details</span>
              </a>
          </li>
          <li>
          <a href="Html/contact.php">
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
        <div class="row">
            <h1><b><font color="#fff">WELCOME </font><font color="red"> ADMIN</font></b></h1>
          </div>
          <!----------------------Adding auto cancel uncollected books  -->
          
         
         
    <div id="projectFacts" class="sectionClass">
    
    <h2><b><font color="red";>Statistics</font></b></h2>
    
    <div class="fullWidth">
        <div class="projectFactsWrap ">

        <!-- Get Total Items -->
    
    <?php

    $sumb = "SELECT SUM(quantity) AS sum FROM itemproducts";

    $sumresult = mysqli_query($mysqli,$sumb);

    $sumcheck = mysqli_fetch_array($sumresult);

    $totalitems = $sumcheck['sum'];
 
    ?>
            <div class="item">
                <img src="Images/items.png">
                <p class="number"><?php echo "$totalitems"; ?></p>
                <span></span>
                <p>Total Items</p>
            </div>

        <!-- Get Issue book Count -->

        <?php

$sumb = "SELECT COUNT(msg) AS sum FROM faq";

$sumresult = mysqli_query($mysqli,$sumb);

$sumcheck = mysqli_fetch_array($sumresult);

$totalbrands = $sumcheck['sum'];

?>
            <div class="item">
                <img src="Images/faq.png" class="rounded-circle">
                <p class="number"><?php echo "$totalbrands"; ?></p>
                <span></span>
                <p>FAQ</p>
            </div>
        
        <!-- Return books count -->

        <?php
        

$sumb = "SELECT SUM(userName) AS sum FROM userreg";

$sumresult = mysqli_query($mysqli,$sumb);

$sumcheck = mysqli_fetch_array($sumresult);

$totalmemb = $sumcheck['sum'];

?>
            <div class="item">
                <img src="Images/reviwe.png">
                <p class="number"><?php echo "$totalmemb"; ?></p>
                <span></span>
                <p>Reviwes</p>
            </div>

        <!-- Get Members Count-->

        <?php

$sumb = "SELECT COUNT(id) AS sum FROM userreg";

$sumresult = mysqli_query($mysqli,$sumb);

$sumcheck = mysqli_fetch_array($sumresult);

$totalmemb = $sumcheck['sum'];

?>

            <div class="item">
                <img src="Images/admin.png">
                <p class="number"><?php echo "$totalmemb"; ?></p>
                <span></span>
                <p>Total Members</p>
            </div>
        </div>
    </div>
</div> 
<!-- Get Members Count-->

        
    
<!--------------------------------------------------------------------- News ----------------------------------------------------------------->
     <section class="contact section" id="news">
     <div class="container">
                            
      <div class="row">

          <div class="col-md-6 col-12">
          <h2>Promotion Ads</h2>

            <!-- ALERT -->
            <?php
           if (isset($_SESSION['news']))
           { 
                         echo'<div class="alert ';echo ($_SESSION['ntype']) ;echo '" role="alert">
                          <center>';?>  <?php echo ($_SESSION['news']) ;?>
                          <?php unset ($_SESSION['news']); ?> <?php echo '</center></div>';

           }?>


                    <p><font color=red><i class="fa fa-file"></i> </font>Upload recent Promotions here.</p>
                        

                        <form action="Html/news.php" method="post" class="contact-form webform" enctype="multipart/form-data">
                            

                            <input type="text" class="form-control" name="topic" placeholder="Topic" required>

                            <textarea class="form-control" rows="5" name="msg" placeholder="Message" required></textarea>

                            <input type="file" class="form-control" name="cover" required>

                            <button type="submit" class="form-control" id="submit-button" name="newssubmit">Upload</button>
                        </form>
            </div>

           <div id="calendar" class="col-md-6 col-12 ">
                    <h4 class="cal"><font color=#339933>Calendar</font></h4>
                    
                    <div class="icalendar">
                    <div class="icalendar__month">
                    <div class="icalendar__prev" onclick="moveDate('prev')">
                    <span>&#10094</span>
                    </div>
                    <div class="icalendar__current-date">
                            <h2 id="icalendarMonth"></h2>
                            <div>
                                <div id="icalendarDateStr"></div>
                            </div>

                        </div>
                        <div class="icalendar__next" onclick="moveDate('next')">
                            <span>&#10095</span>
                        </div>
                    </div>
                    <div class="icalendar__week-days">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="icalendar__days"></div>
                    </div>
                
             </div>


            </div>

              <!-- News table -->

                  <?php
                    if (isset($_GET['delnews']))
                    { 
                   echo '<div class="flash-data" data-flashdata="'.$_GET["delnews"].'" ></div>';
                   echo'<script>    
                        if(typeof window.history.pushState == "function") {
                        window.history.pushState({}, "Hide", "Dashboard.php#issue_data");
                        }
                        </script>';
                    }?>

                   <h3 align="center">Promotions</h3>  

                               <!-- ALERT -->
                               <?php
                                if (isset($_GET['error']))
                                { 
                                echo'<div class="alert alert-danger" role="alert"><center><b>Cant Delete Record !</center></b></div>';
                                echo'<script>    
                                if(typeof window.history.pushState == "function") {
                                window.history.pushState({}, "Hide", "Dashboard.php#issue_data");
                                }
                                </script>';

                                }?>
               
               <?php 

                  $getpromo = "SELECT * FROM promotion ORDER BY promoid DESC";
                  $getpromoquery = mysqli_query($mysqli,$getpromo);

                  if($getpromoquery)
                  {
                      $promorow = mysqli_num_rows($getpromoquery);
                                      

                    //insert data into issue table

                    if($promorow>0)
                    {
                      echo '<div class="table-responsive">  
                            <table id="issue_data" class="table table-striped table-bordered">  
                            <thead>  
                            <tr>
                                <td>Promotion ID</td>    
                                <td>Promotion</td>  
                                <td>Discription</td>  
                                <td>Cover</td>   
                            </tr>  
                            </thead> '; 
                      
                      while ($getpromorow = mysqli_fetch_array($getpromoquery))  
                      {  
                          echo '  
                          <tr>  
                                <td>'.$getpromorow["promoid"].'</td>
                                <td>'.$getpromorow["topic"].'</td>  
                                <td>'.$getpromorow["msg"].'</td>  
                                <td><center><a id="collect" href="Html/newscancel.php?newsid='.$getpromorow["promoid"].'" class="btn btn-primary delnews">Remove</a></center></td>  
                          </tr>  
                          ';  
                      }  
                      
                      echo '</table>  
                      </div>';   
                    }
                    else
                    {
                      echo '<h6><i class="fa fa-certificate"></i> &nbsp;Doesnt have any data yet.</h6>';

                    }
                  }
                

                ?>
                    
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

<!---------------------- report----------------- -->

<section id=report style="background: linear-gradient(357deg, rgba(2,0,36,1) 0%, rgba(2,0,36,0.4713235636051295) 50%, rgba(0,212,255,0) 100%);">

<h1>Check Monthly Report</h1>
      <div class="container">
          <div class="row">
                 
        <form method="post" action="html/reports.php">
        <div class="col-md-5">
        <select class="form-control" name="month" required>
        <option>Choose Month</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>       
        </select>
        </div>

        <div class="col-md-5">
        <input type="number" class="form-control" name="year" placeholder="Enter Year" required/>
        </div>
        <div class="col-md-2">
        <button type="submit" class="btn btn-primary" name="check">Check</button>
        </div>
                    
						
					</form>
                </div>
      </div>
    </section>




    
     
    <!--main content end-->
       
         
           <!--footer start-->
    <footer class="footer">
      <div class="text-center">
        <p>
          &copy;2022 Copyrights <strong>Crystal Tech Computers</strong>. ProjectCconcept All Rights Reserved
        </p>
      </div>
    </footer>
    <!--footer end-->
 
  
  
  <!-- js placed at the end of the document so the pages load faster -->


  <script src="lib/javascript-calendar.js" type="text/javascript"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to CTC ADMIN DASHBOARD!',
        // (string | mandatory) the text inside the notification
        text: '',
        // (string | optional) the image to display on the left
        image: 'Images/loginlogo',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script src="counter.js"></script>

  <script>  
 $(document).ready(function(){  
      $('#issue_data').DataTable();  
 });  
 </script>

 <!-- calendar -->
 <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>

</html>
