<?php

$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 

        //send msg to db
        if(isset($_POST['send']))
        {
        $member = $_POST['sendto'];
        $message = $_POST['message'];
        $today =  date('Y-m-d H:i:s');

        $message = $mysqli->real_escape_string($message);

        $send_msg = "INSERT INTO chat (msg_from, msg_to, msg, date, seen) VALUES ('admin','$member','$message','$today','no')";
        $check_msg = mysqli_query($mysqli,$send_msg);

            //SET NOTIFICATION 

            //get user id

            $getuser = "SELECT * FROM user_register WHERE fullname = '$member'";

            $usercheck = mysqli_query($mysqli,$getuser);

            $userresult = mysqli_fetch_assoc($usercheck);

            $userid = $userresult['mem-id'];

            //get current time

            $adasaduda = date('Y-m-d H:i:s');

            //Get msg into variable

            $gtmsg= "SELECT msg FROM notification WHERE msgid=11";

            $colmsg = mysqli_query($mysqli,$gtmsg);

            $colmsgcheck = mysqli_fetch_assoc($colmsg);

            $msg = $colmsgcheck['msg'];


            $not = "INSERT INTO notification(memberid, msg, date) VALUES ('$userid','$msg','$adasaduda')";

            $notquery = mysqli_query($mysqli, $not);

            //notification entered.

        if($check_msg && $notquery)
        {
            header("location:chat.php?member=$member");

        }
        else
        {
            echo '<div class="alert alert-danger"><center>Cant Send Message</center><div>';
        }

        }
?>