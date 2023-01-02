
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SipSewana Admin Panel</title>


  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/chat.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>

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
      <a href="../Dashboard.php" class="logo"><b>Sip<span>Sewana</span></b></a>
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
          <li><a class="logout" href="logout.php">Logout</a></li>
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
          <p class="centered"><img src="../Images/logo.png" class="img-circle" width="80"></p>
          <h5 class="centered">Welcome</h5>
          <li class="mt">
            <a class="sub-menu" href="../Dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Books</span>
              </a>
            <ul class="sub">
              <li><a href="additems.php">Add books</a></li>
              <li><a href="updatebooks.php">Update books</a></li>
              <li><a href="allitems.php">All books</a></li>
            </ul>
          </li>
          
         <li class="sub-menu">
            <a href="pending.php">
            <i class="fa fa-archive"></i>
            <span>Pending Reservations</span>
            </a>
          </li>
          
          <li class="sub-menu">
            <a href="issuebooks.php">
              <i class="fa fa-bookmark"></i>
              <span>Issue books</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="returnbooks.php">
              <i class="fa fa-address-book"></i>
              <span>Return books</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="fine.php">
              <i class="fa fa-info-circle"></i>
              <span>Fine Details</span>
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
          <li>
            <a href="chat.php">
              <i class="fa fa-comments"></i>
              <span>Chat </span>
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

	<div class="container main-section">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="hidden">
					  <div id="profile">
                        <div class="wrap">
                            <img id="profile-img" src="../images/admin.png" class="" alt="" /><br>
                            <p>ADMIN</p>
                        </div>
                      </div>
					
				</div>
				<div class="left-chat">
				<?php
				//get member names
				$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 


				$member = "SELECT * FROM user_register";
				$member_result = mysqli_query($mysqli, $member);
				$member_details = mysqli_fetch_assoc($member_result);

				?>
					<ul>
					<?php 
					while($member_details = mysqli_fetch_assoc($member_result))
					{
					$memid = $member_details['mem-id'];
					$name = $member_details['fullname'];
					
					echo'<li>
							<div class="chat-left-img">
							<a style="text-decoration:none; cursor: pointer;" href="chat.php?member='.$name.'">
							<img src="../Images/chatter.png" alt="" />
							</div>
							<div class="chat-left-detail">
								<p style = "text-transform:capitalize; font-family:cursive;">'.$name.'</p>
								<span><i class="fa fa-circle" aria-hidden="true"></i></span>
							</div>
							</a>
						</li>';
					}
					?>  
					</ul>
				</div>
			</div>


			<!-- left panel -->
  <?php
  if(isset($_GET['member']))
  {
      $member = $_GET['member'];

      //select messages
      $sel_msg = "SELECT * FROM chat WHERE (msg_from='$member' AND msg_to='admin') OR (msg_from='admin' AND msg_to='$member') ORDER BY id ASC";
      $run_msg = mysqli_query($mysqli, $sel_msg);
    
    if($run_msg)
    {
        $num_msg = mysqli_num_rows($run_msg);

        if($num_msg==0)
        {
			echo '<div class="col-md-8 col-sm-8 col-xs-12 right-sidebar">
				<div class="row">
					<div class="col-md-12 right-header">
						<div class="right-header-img">
						<img src="../Images/chat1.png" alt="" />
						</div>
						<div class="right-header-detail">
							<p style="text-transform:capitalize;">'.$member.'</p>
						</div>
					</div>
				</div>';

				echo '<div class="row">
					    <div class="col-md-12 right-header-contentChat">
						<ul>
							<li>
								<div class="rightside-left-chat">
									<span><i class="fa fa-circle" aria-hidden="true"></i> <small></small> </span><br><br>
									<p>Type Something to Start Conversation!</p>
								</div>
							</li>
							<li>
								<div class="rightside-right-chat">
									<span> <small></small><i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
									<p>Type Something to Start Conversation!</p>
								</div>
							</li>
						</ul>
					</div>
				</div>';
		
				echo'<div class="row">
					 <div class="col-md-12 right-chat-textbox">
					    <form action="chatsend.php" method="post">
						<input type="hidden" name="sendto" value="'.$member.'">
						<input type="text" name="message" placeholder="Write your message..." required/>
						<button class="submit" name="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
					    </form>
					</div>
				</div>
			</div>'; 
		}
		else
        {

		 echo '<div class="col-md-8 col-sm-8 col-xs-12 right-sidebar">
				  <div class="row">
					<div class="col-md-12 right-header">
						<div class="right-header-img">
						<img src="../Images/chat1.png" alt="" />
						</div>
						<div class="right-header-detail">
							<p style="text-transform:capitalize;">'.$member.'</p>
						</div>
					</div>
					</div>';
					
					echo '<div class="row">
								<div class="col-md-12 right-header-contentChat">
								<ul>';
									while($read_msg = mysqli_fetch_assoc($run_msg))
									{
										$reply= $read_msg['msg_from'];
										$send= $read_msg['msg_to'];
										$msg = $read_msg['msg'];
										$date = $read_msg['date'];

										if($date) 
										  {
											$date = date("F d, g:i a", strtotime($date));
										  } 
										  else 
										  {
											  $date = '';
										  }

										if($reply==($member) AND $send=='admin')
										{
										echo'<li>
												<div class="rightside-left-chat">
													<span><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;
                                                    <b style="font-size:14px; text-transform:capitalize; color:#e6e6e6;">'.$reply.'</b>
                                                    <small>&nbsp;'.$date.'</small> </span><br><br>
													<p style="font-size:14px;">'.$msg.'</p>
												</div>
											</li>';
										}
										if($reply=='admin' AND $send==($member))
										{
										echo'	<li>
												<div class="rightside-right-chat">
												<span><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;
                                                 <b style="font-size:14px; text-transform:capitalize; color:#e6e6e6;">'.$reply.'</b>
                                                 <small>&nbsp;'.$date.'</small> </span><br><br>
												<p style="font-size:14px;">'.$msg.'</p>
												</div>
											</li>';
										}
									}
					echo'	</ul>
							</div>
					    </div>';


						echo'<div class="row">
						<div class="col-md-12 right-chat-textbox">
						   <form action="chatsend.php" method="post">
						   <input type="hidden" name="sendto" value="'.$member.'">
						   <input type="hidden" name="memid" value="'.$memid.'">
						   <input type="text" name="message" placeholder="Write your message..." required/>
						   <button class="submit" name="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
						   </form>
					   </div>
				   </div>
			   </div>'; 
		}
		
	 }
   }
   else
   {
 echo '<div class="col-md-8 col-sm-8 col-xs-12 right-sidebar">
			<div class="row">
				<div class="col-md-12 right-header">
					<div class="right-header-img">
					<img src="../Images/chat1.png" alt="" />
					</div>
					<div class="right-header-detail">
						<p style="text-transform:capitalize;">SELECT A MEMBER TO CHECK MESSAGES</p>
					</div>
				</div>
			</div>';

		  echo '<div class="row">
					<div class="col-md-12 right-header-contentChat">
					 <ul>
						<li>
							<div class="rightside-left-chat">
								<span><i class="fa fa-circle" aria-hidden="true"></i> <small></small> </span><br><br>
								<p>Select a Member to Check Conversation!</p>
							</div>
						</li>
						<li>
							<div class="rightside-right-chat">
								<span> <small></small><i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
								<p>Select a Member to Check Conversation!</p>
							</div>
						</li>
					 </ul>
					</div>
				</div>';
		  echo'<div class="row">
				<div class="col-md-12 right-chat-textbox">
				   <input type="text" name="message" placeholder="Write your message..." required/>
			   </div>
		   </div>
        </div>';

   }
   
 
 ?>
	</div>
	</div>
<script>
$(document).ready(function(){
    	var height = $(window).height();
    	$('.left-chat').css('height', (height - 92) + 'px');
    	$('.right-header-contentChat').css('height', (height - 163) + 'px');
    });
</script>

    <!--main content end-->
	</section>
      </section>

      
       
        
         
    <!--footer start-->
    <footer class="footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Sipsewana</strong>. All Rights Reserved
        </p>
      </div>
    </footer>
    <!--footer end-->
  </section>
  
  
  <!-- js placed at the end of the document so the pages load faster -->

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