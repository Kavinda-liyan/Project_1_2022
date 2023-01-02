    <!--------------------------- AUTO PROCESS RESERVE NOT COLLECT--------------------------------->
    <?php
    
    
    $getcollect = "SELECT * from issuebook where returndate IS NULL AND issuedate IS NOT NULL";

    $collectquery = mysqli_query($mysqli,$getcollect);


    while(!empty($colectres = mysqli_fetch_assoc($collectquery)))
    {
       
    $cdate = $colectres['collectdate'];
    $today = date('Y-m-d');

    //convert string to object
    $coldate = new DateTime($cdate);
    $ada = new DateTime($today);

    // calculates the difference between DateTime objects 
    $interval = date_diff($ada,$coldate);

    // printing result in days format 
     $x=$interval->format('%R%a');
    
    //auto process
    if($x>=0)
    {
      //if difference > =0 CONTINUE normal process
    }
    else
    {
      //IF <0 EXCUTE AUTO PROCESS
      $cmem = $colectres['memberid'];
      $cbook = $colectres['bookid'];

              //Check avalibility of pending request

              $pen = "SELECT * FROM issuebook WHERE issuedate IS NULL AND bookid='$cbook' ORDER BY issueid ASC";

              $penr = mysqli_query($mysqli,$pen);
      
              $penc = mysqli_fetch_assoc($penr);
      
              $p = $penc['memberid'];
      
      
             //check quantity is 0
      
              $chkqty = "SELECT quantity FROM addbook WHERE book_id='$cbook'";
      
              $chkres = mysqli_query($mysqli, $chkqty);
      
              $chkchk = mysqli_fetch_assoc($chkres);
      
              $c= $chkchk['quantity'];
      
      
              //issue dates to pending reservations
      
              if($c==0 && !empty($p))
              {
                  $currentdate = date('Y-m-d');
                  $collectdate = date('Y-m-d', strtotime($currentdate.'+3 days'));
      
                  $assign = "UPDATE issuebook SET issuedate='$currentdate', collectdate='$collectdate' WHERE memberid='$p'";
      
                  $assignr = mysqli_query($mysqli, $assign);
      
                  //reduce quantity
      
                  if($assignr == true)
                  {    
                      $reqty ="UPDATE addbook SET quantity = quantity -1 WHERE book_id='$cbook'";
      
                      $reqtyr = mysqli_query($mysqli, $reqty);

                                //SET NOTIFICATION 

                                $adasaduda = date('Y-m-d H:i:s');

                                //Get msg into variable
                    
                                $gtmsg= "SELECT msg FROM notification WHERE msgid=4";
                    
                                $colmsg = mysqli_query($mysqli,$gtmsg);
                    
                                $colmsgcheck = mysqli_fetch_assoc($colmsg);
                    
                                $msg = $colmsgcheck['msg'];
                    
                    
                    
                                $not = "INSERT INTO notification(memberid, msg, date) VALUES ('$p','$msg','$adasaduda')";
                    
                                $notquery = mysqli_query($mysqli, $not);
                    
                                //notification entered.
      
                      if($reqtyr == true && $notquery==true)
                      {
      
                        echo'<div class="alert alert-success" role="alert"><center><b>Book AUTOMATICALLY Assigned to Pending Reservations!</center></b></div>';
      
      
                      }
                      else
                      {
      
                        echo'<div class="alert alert-danger" role="alert"><center><b>Error!</center></b></div>';
      
                      }
      
                  }
              }

      //delete uncollect order

      $delissue = "DELETE FROM issuebook WHERE memberid='$cmem' AND bookid='$cbook'";

      $delquery = mysqli_query($mysqli, $delissue);

                    //SET NOTIFICATION 

                    $heta = date('Y-m-d H:i:s');

                    //Get msg into variable
        
                    $delmsg= "SELECT msg FROM notification WHERE msgid=5";
        
                    $deletemsg = mysqli_query($mysqli,$delmsg);
        
                    $deletemsgcheck = mysqli_fetch_assoc($deletemsg);
        
                    $delmsg = $deletemsgcheck['msg'];
        
        
        
                    $notdeletemsg = "INSERT INTO notification(memberid, msg, date) VALUES ('$cmem','$delmsg','$heta')";
        
                    $notdeletemsgquery = mysqli_query($mysqli, $notdeletemsg);
        
                    //notification entered.

      if($delquery==true && $notdeletemsgquery==true)
      {
        $reqty ="UPDATE addbook SET quantity = quantity +1 WHERE book_id='$cbook'";

        $reqtyr = mysqli_query($mysqli, $reqty);

        if($reqtyr == true)
        {

        echo'<div class="alert alert-danger" role="alert"><center><b>Reservation removed becuase member didnt collect the book before due time</center></b></div>';


        }
        else
        {

          echo'<div class="alert alert-danger" role="alert"><center><b>Error!</center></b></div>';

        }
      }
      //delete end

    }
    
    } 
    ?>  
      
    <!----------------------------------------------------------------- AUTO PROCESS END---------------------------------------------------------- -->