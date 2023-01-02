    <!--------------------------- SEND NOTIFICATION WHEN RETURN DATE CLOSE AND AFTER--------------------------------->
<?php
    
     // Instantiate DB & connect
    $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 
    
    //returndate notification//////////////////////////////////////////////////////////////////////////////
    $getreturndate = "SELECT * from issuebook where returndate IS NOT NULL";

    $getreturndatequery = mysqli_query($mysqli,$getreturndate);

    if($getreturndatequery)
    {
            while($getreturnresult = mysqli_fetch_assoc($getreturndatequery))
        {
        
            $retdate = $getreturnresult['returndate'];
            $adadawasa = date('Y-m-d');

            //convert string to object
            $oretdate = new DateTime($retdate);
            $oadadawasa = new DateTime($adadawasa);

            // calculates the difference between DateTime objects 
            $datechange = date_diff($oadadawasa,$oretdate);

            // printing result in days format 
            $ret=$datechange->format('%R%a');

            
            //notification returndate 3days
            if($ret==3)
            {
            
             $retmem = $getreturnresult['memberid'];
             $retbook = $getreturnresult['bookid'];


                //SET NOTIFICATION 

                $returnwardate = date('Y-m-d H:i:s');

                //Get msg into variable

                $gtreturnmsg= "SELECT msg FROM notification WHERE msgid=6";

                $retwarmsg = mysqli_query($mysqli,$gtreturnmsg);

                $retwarmsgcheck = mysqli_fetch_assoc($retwarmsg);

                $retwarmsg = $retwarmsgcheck['msg'];



                //check notification still in the table

                $checkretnot = "SELECT * FROM notification WHERE memberid = '$retmem' AND bookid = '$retbook' AND msg = '$retwarmsg' AND msgid IS NULL";

                $checkretnotquery = mysqli_query($mysqli,$checkretnot);

                $checkretnotcount = mysqli_num_rows($checkretnotquery);

                if($checkretnotcount > 0)
                {

                }
                else
                {
                    
                    
                    
                    $retwarnot = "INSERT INTO notification(memberid, bookid, msg, date) VALUES ('$retmem','$retbook','$retwarmsg','$returnwardate')";
        
                    $retwarnotquery = mysqli_query($mysqli, $retwarnot);
                        
                                    //notification entered.
        
                        if($retwarnotquery==true)
                        {
        
                            echo'<div class="alert alert-success" role="alert"><center><b>Return Alert Send To Relevent Users</center></b></div>';
        
        
                        }
                        else
                        {
        
                            echo'<div class="alert alert-danger" role="alert"><center><b>3days left Error!</center></b></div>';
        
                        }
                }
      
            }
                //notification returndate today
            elseif($ret==0)
                {
                
                    $retmem = $getreturnresult['memberid'];
                    $retbook = $getreturnresult['bookid'];

                    //get user email
                    $getemail = "SELECT * FROM user_register WHERE `mem-id`='$retmem'";

                    $mailresult = mysqli_query($mysqli,$getemail);

                    $email = mysqli_fetch_assoc($mailresult);

                    $mail = $email['email'];

                    //get book name for email

                    $getbook = "SELECT * FROM addbook WHERE book_id ='$retbook'";
                    $getbname = mysqli_query($mysqli,$getbook);
                    $bname = mysqli_fetch_assoc($getbname);
                    $bookname = $bname['title'];


                    //SET NOTIFICATION 

                    $returnwardate = date('Y-m-d H:i:s');

                    //Get msg into variable

                    $gtreturnmsg= "SELECT msg FROM notification WHERE msgid=8";

                    $retwarmsg = mysqli_query($mysqli,$gtreturnmsg);

                    $retwarmsgcheck = mysqli_fetch_assoc($retwarmsg);

                    $retwarmsg = $retwarmsgcheck['msg'];



                        //check notification still in the table

                        $checkretnot = "SELECT * FROM notification WHERE memberid = '$retmem' AND bookid = '$retbook' AND msg = '$retwarmsg' AND msgid IS NULL";

                        $checkretnotquery = mysqli_query($mysqli,$checkretnot);

                        $checkretnotcount = mysqli_num_rows($checkretnotquery);

                        if($checkretnotcount > 0)
                        {

                        }
                        else
                        {
                        
                        
                            $retwarnot = "INSERT INTO notification(memberid, bookid, msg, date) VALUES ('$retmem','$retbook','$retwarmsg','$returnwardate')";
                
                            $retwarnotquery = mysqli_query($mysqli, $retwarnot);
                                
                                            //notification entered.

                                    //send gmail

                                    $mailTo = "$mail";
                                    $headers = "FROM : vhasaral@gmail.com";
                                    $subject = "You have received an e-mail from SipSewana Library";
                                    $txt = "Today is the last day to return `".$bookname."`, book.If you are unable to return it before tommorow, Penalty will be added to your member account. ";
                                
                                    $mailcheck = mail($mailTo, $subject, $txt, $headers);
                    
                                    if($retwarnotquery==true && $mailcheck==true)
                                    {
                    
                                    echo'<div class="alert alert-success" role="alert"><center><b>Final Returnday Alert Send To Relevent Users</center></b></div>';
                    
                    
                                    }
                                    else
                                    {
                    
                                    echo'<div class="alert alert-danger" role="alert"><center><b>Today Error!</center></b></div>';
                    
                                    }
                        }
            
                }
                //notification returndate expired
                elseif($ret==-1)
                    {
                    
                        $retmem = $getreturnresult['memberid'];
                        $retbook = $getreturnresult['bookid'];


                        //SET NOTIFICATION 

                        $returnwardate = date('Y-m-d H:i:s');

                        //Get msg into variable

                        $gtreturnmsg= "SELECT msg FROM notification WHERE msgid=7";

                        $retwarmsg = mysqli_query($mysqli,$gtreturnmsg);

                        $retwarmsgcheck = mysqli_fetch_assoc($retwarmsg);

                        $retwarmsg = $retwarmsgcheck['msg'];


                            //check notification still in the table

                            $checkretnot = "SELECT * FROM notification WHERE memberid = '$retmem' AND bookid = '$retbook' AND msg = '$retwarmsg' AND msgid IS NULL";

                            $checkretnotquery = mysqli_query($mysqli,$checkretnot);

                            $checkretnotcount = mysqli_num_rows($checkretnotquery);

                            if($checkretnotcount > 0)
                            {

                            }
                            else
                            {
                            
                            
                            
                                $retwarnot = "INSERT INTO notification(memberid, bookid, msg, date) VALUES ('$retmem','$retbook','$retwarmsg','$returnwardate')";
                    
                                $retwarnotquery = mysqli_query($mysqli, $retwarnot);
                                    
                                                //notification entered.
                        
                                        if($retwarnotquery==true)
                                        {
                        
                                        echo'<div class="alert alert-success" role="alert"><center><b>Penalty Added Alert Send To Relevent Users</center></b></div>';
                        
                        
                                        }
                                        else
                                        {
                        
                                        echo'<div class="alert alert-danger" role="alert"><center><b>Penalty Error!</center></b></div>';
                        
                                        }
                            }
                
                    }
                    else
                    {
                        echo ".";
                    }
        }
            


    }

    //return date notification ends/////////////////////////////////////////////////////////////////////////


    //get collectdate notification

     $getColDate = "SELECT * from issuebook where returndate IS NULL AND issuedate IS NOT NULL";
     $getColQuery = mysqli_query($mysqli, $getColDate);

     if($getColQuery)
     {
             while($getColResult = mysqli_fetch_assoc($getColQuery))
         {
         
             $ColDateNot = $getColResult['collectdate'];
             $ColDateToday = date('Y-m-d');
 
             //convert string to object
             $colNotDate = new DateTime($ColDateNot);
             $colAdaDawasa = new DateTime($ColDateToday);
 
             // calculates the difference between DateTime objects 
             $ColDateDiff = date_diff($colAdaDawasa,$colNotDate);
 
             // printing result in days format 
             $DateDiff=$ColDateDiff->format('%R%a');

             echo $DateDiff;

            //notification collect 1day
            if($DateDiff==1)
            {
            
             $colNotMem = $getColResult['memberid'];
             $colNotBook = $getColResult['bookid'];


                //SET NOTIFICATION 

                $colDateSet = date('Y-m-d H:i:s');

                //Get msg into variable

                $msgNotCol= "SELECT msg FROM notification WHERE msgid=9";

                $msgNotColQuery = mysqli_query($mysqli,$msgNotCol);

                $msgNotColData = mysqli_fetch_assoc($msgNotColQuery);

                $colNotmsg = $msgNotColData['msg'];



                //check notification still in the table

                $checkcolnot = "SELECT * FROM notification WHERE memberid = '$colNotMem' AND bookid = '$colNotBook' AND msg = '$colNotmsg' AND msgid IS NULL";

                $checkcolnotquery = mysqli_query($mysqli,$checkcolnot);

                $checkcolnotcount = mysqli_num_rows($checkcolnotquery);

                if($checkcolnotcount > 0)
                {

                }
                else
                {
                    
                    
                    
                    $colwarnot = "INSERT INTO notification(memberid, bookid, msg, date) VALUES ('$colNotMem','$colNotBook','$colNotmsg','$colDateSet')";
        
                    $colwarnotquery = mysqli_query($mysqli, $colwarnot);
                        
                                    //notification entered.
        
                        if($colwarnotquery==true)
                        {
        
                            echo'<div class="alert alert-success" role="alert"><center><b>Collect Tommorow Alert Send To Relevent Users</center></b></div>';
        
        
                        }
                        else
                        {
        
                            echo'<div class="alert alert-danger" role="alert"><center><b>3days left Error!</center></b></div>';
        
                        }
                }
      
            }
                        //notification collect 1day
                        if($DateDiff==0)
                        {
                        
                         $colNotMem = $getColResult['memberid'];
                         $colNotBook = $getColResult['bookid'];

            
            
                            //SET NOTIFICATION 
            
                            $colDateSet = date('Y-m-d H:i:s');
            
                            //Get msg into variable
            
                            $msgNotCol= "SELECT msg FROM notification WHERE msgid=10";
            
                            $msgNotColQuery = mysqli_query($mysqli,$msgNotCol);
            
                            $msgNotColData = mysqli_fetch_assoc($msgNotColQuery);
            
                            $colNotmsg = $msgNotColData['msg'];
            
            
            
                            //check notification still in the table
            
                            $checkcolnot = "SELECT * FROM notification WHERE memberid = '$colNotMem' AND bookid = '$colNotBook' AND msg = '$colNotmsg' AND msgid IS NULL";
            
                            $checkcolnotquery = mysqli_query($mysqli,$checkcolnot);
            
                            $checkcolnotcount = mysqli_num_rows($checkcolnotquery);
            
                            if($checkcolnotcount > 0)
                            {
            
                            }
                            else
                            {
                                
                                
                                
                                $colwarnot = "INSERT INTO notification(memberid, bookid, msg, date) VALUES ('$colNotMem','$colNotBook','$colNotmsg','$colDateSet')";
                    
                                $colwarnotquery = mysqli_query($mysqli, $colwarnot);

                                    
                                    //notification entered.
                    
                                    if($colwarnotquery==true)
                                    {
                    
                                        echo'<div class="alert alert-success" role="alert"><center><b>Final Collect Day Alert Send To Relevent Users</center></b></div>';
                    
                    
                                    }
                                    else
                                    {
                    
                                        echo'<div class="alert alert-danger" role="alert"><center><b>3days left Error!</center></b></div>';
                    
                                    }
                            }
                  
                        }

             
        
         }
     }


    
?>  
      
    <!----------------------------------------------------------------- AUTO PROCESS END---------------------------------------------------------- -->