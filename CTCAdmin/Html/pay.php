<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

if( isset($_GET['mem'])){

   $mem_id = $_GET['mem'];

   $bid = $_GET['book'];

   $pay = $_GET['pay'];

   $getcdate = "SELECT * FROM issuebook WHERE memberid='$mem_id' AND bookid='$bid' AND fine = '$pay'";

   $getresult = mysqli_query($mysqli,$getcdate);

   $getcheck = mysqli_fetch_assoc($getresult);

   

   if(empty($getcheck['payday']))
   {

            $currentdate = date('Y-m-d');

            $query = "UPDATE issuebook SET payday ='$currentdate' WHERE memberid='$mem_id' AND bookid='$bid' AND fine = '$pay'";

            $right = $mysqli->query($query);

                        //SET NOTIFICATION 

                        $ada = date('Y-m-d H:i:s');

                        //Get msg into variable
            
                        $gtmsg= "SELECT msg FROM notification WHERE msgid=3";
            
                        $colmsg = mysqli_query($mysqli,$gtmsg);
            
                        $colmsgcheck = mysqli_fetch_assoc($colmsg);
            
                        $msg = $colmsgcheck['msg'];
            
            
            
                        $not = "INSERT INTO notification(memberid, msg, date) VALUES ('$mem_id','$msg','$ada')";
            
                        $notquery = mysqli_query($mysqli, $not);
            
                        //notification entered.

            if($right==true && $notquery==true)
                {
                $_SESSION['message'] = "Member Paid The Fine!";
                $_SESSION['type'] = "alert-success";

                header("location:fine.php");

                }
                else
                {
                    $_SESSION['message'] = "Sorry! Can't Fullfill The Payment!";
                    $_SESSION['type'] = "alert-danger";

                    header("location:fine.php");
                   
                }
    }
    else
    {
        $_SESSION['message'] = "Member ALREADY Paid The Fine!";
        $_SESSION['type'] = "alert-warning";
        header("location:fine.php");

        
    }

}

if( isset($_GET['delmemid'])){

    $delmemid = $_GET['delmemid'];
 
    $delbookid = $_GET['delbook'];

    $delmemp = "DELETE FROM issuebook WHERE memberid ='$delmemid' AND bookid='$delbookid'";

    $delrightp = $mysqli->query($delmemp);

    if($delrightp==true)
    {

        header("location:fine.php?delfine=1");

        }
    else
        {
            $_SESSION['dmsg'] = "ERROR!";
            $_SESSION['dtype'] = "alert-danger";

            header("location:fine.php");
           
        }
}
?>