<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli));

if( isset($_GET['return'])){

   $mem_id = $_GET['return'];

   $bid = $_GET['book'];

   $redate = "SELECT * FROM issuebook WHERE memberid='$mem_id' AND bookid='$bid'";

   $result = mysqli_query($mysqli,$redate);

   $recheck = mysqli_fetch_assoc($result);


    if(empty($recheck['completedate']))
    {

        //Check avalibility of pending request

        $pen = "SELECT * FROM issuebook WHERE issuedate IS NULL AND bookid='$bid' ORDER BY issueid ASC";

        $penr = mysqli_query($mysqli,$pen);

        $penc = mysqli_fetch_assoc($penr);

        $p = $penc['memberid'];

        //get user email
        $getemail = "SELECT * FROM user_register WHERE `mem-id`='$p'";

        $mailresult = mysqli_query($mysqli,$getemail);

        $email = mysqli_fetch_assoc($mailresult);

        $mail = $email['email'];



       //check quantity is 0

        $upqty = $recheck['bookid'];

        $chkqty = "SELECT * FROM addbook WHERE book_id='$upqty'";

        $chkres = mysqli_query($mysqli, $chkqty);

        $chkchk = mysqli_fetch_assoc($chkres);

        $c= $chkchk['quantity'];
        $name = $chkchk['title'];


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
                $reqty ="UPDATE addbook SET quantity = quantity -1 WHERE book_id='$upqty'";

                $reqtyr = mysqli_query($mysqli, $reqty);

                                        //SET NOTIFICATION 

                                        $ada = date('Y-m-d H:i:s');

                                        //Get msg into variable
                            
                                        $gtmsg= "SELECT msg FROM notification WHERE msgid=4";
                            
                                        $colmsg = mysqli_query($mysqli,$gtmsg);
                            
                                        $colmsgcheck = mysqli_fetch_assoc($colmsg);
                            
                                        $msg = $colmsgcheck['msg'];
                            
                            
                            
                                        $not = "INSERT INTO notification(memberid, msg, date) VALUES ('$p','$msg','$ada')";
                            
                                        $notquery = mysqli_query($mysqli, $not);
                            
                                        //notification entered.

                //send gmail

                $mailTo = "$mail";
                $headers = "FROM : vhasaral@gmail.com";
                $subject = "You have received an e-mail from SipSewana Library";
                $txt = "Requested book of yours `".$name."`, now assigned to your reservation.Please collect it before due date.";
            
                $mailcheck = mail($mailTo, $subject, $txt, $headers);
                
                

                if($reqtyr == true && $notquery==true && $mailcheck)
                {

                $_SESSION['msg'] = "Book AUTOMATICALLY Assigned to Pending Reservations!";
                $_SESSION['ptype'] = "alert-success";

                header("location:returnbooks.php");


                }
                else
                {

                $_SESSION['msg'] = "Can't Assign Book to Pending Reservations!";
                $_SESSION['ptype'] = "alert-danger";

                header("location:returnbooks.php");

                }

            }
        }
    


    //update quantity when return +1

    $quan = "UPDATE addbook SET quantity = quantity +1 WHERE book_id='$upqty'";

    $quanres = mysqli_query($mysqli,$quan);


        //set complete date

            $gavedate = date('Y-m-d');

            $query = "UPDATE issuebook SET completedate ='$gavedate' WHERE memberid='$mem_id' AND bookid='$bid'";

            $right = $mysqli->query($query);

                        //SET NOTIFICATION 

                        $dawasa = date('Y-m-d H:i:s');

                        //Get msg into variable
            
                        $remsg= "SELECT msg FROM notification WHERE msgid=2";
            
                        $relmsg = mysqli_query($mysqli,$remsg);
            
                        $remsgcheck = mysqli_fetch_assoc($relmsg);
            
                        $returnmsg = $remsgcheck['msg'];
            
            
            
                        $renot = "INSERT INTO notification(memberid, msg, date) VALUES ('$mem_id','$returnmsg','$dawasa')";
            
                        $renotquery = mysqli_query($mysqli, $renot);
            
                        //notification entered.


            if($right && $quanres==true && $renotquery==true)
                {


                $_SESSION['message'] = "Member Returned The Reserved Book!";
                $_SESSION['type'] = "alert-success";

                header("location:returnbooks.php");

                }
                else
                {
                    $_SESSION['message'] = "Sorry! Can't Return The Book!";
                    $_SESSION['type'] = "alert-danger";

                    header("location:returnbooks.php");

                }




    }
    else
    {
        $_SESSION['message'] = "Member ALREADY Returned Reserved Book!";
        $_SESSION['type'] = "alert-danger";
        header("location:returnbooks.php");


    }

}

if( isset($_GET['delmemid'])){

    $delmemid = $_GET['delmemid'];
 
    $delbookid = $_GET['delbook'];

    $delmemp = "DELETE FROM issuebook WHERE memberid ='$delmemid' AND bookid='$delbookid' AND fine IS NULL";

    $delrightp = $mysqli->query($delmemp);

    if($delrightp==true)
    {

        header("location:returnbooks.php?delrecord=1");

        }
    else
        {
            $_SESSION['dmsg'] = "ERROR!";
            $_SESSION['dtype'] = "alert-danger";

            header("location:returnbooks.php");
           
        }

}

?>