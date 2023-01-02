    <!--------------------------- SEND NOTIFICATION WHEN RETURN DATE CLOSE AND AFTER--------------------------------->
    <?php
    
    // Instantiate DB & connect
   $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 
   
   $getreturndate = "SELECT * from issuebook where returndate IS NOT NULL";

   $getreturndatequery = mysqli_query($mysqli,$getreturndate);

   if($getreturndatequery)
   {
           while($getreturnresult = mysqli_fetch_assoc($getreturndatequery))
       {
       
           $retdate = $getreturnresult['returndate'];//returndate
           $adadawasa = date('Y-m-d');//currentdate

           //convert string to object
           $oretdate = new DateTime($retdate);
           $oadadawasa = new DateTime($adadawasa);

           // calculates the difference between DateTime objects 
           $datechange = date_diff($oretdate,$oadadawasa);

           // printing result in days format 
           $ret=$datechange->format('%R%a');//date difference

           //check the date excced the return date
           if($ret > 0)
           {
             
             $retgivedate = $getreturnresult['completedate'];
           
                //check givedate is null
                if($retgivedate==null)
                {
                    $retmem = $getreturnresult['memberid'];
                    $retbookid = $getreturnresult['bookid'];

                    $totalfine = $ret * 5;

                    //update fine daily
                    $upfine = "UPDATE issuebook SET fine = '$totalfine' WHERE memberid = '$retmem' AND bookid = '$retbookid'";
                    $upfinequery = mysqli_query($mysqli,$upfine);


                    if($upfinequery)
                    {

                        echo'ok';

                    }
                    else
                    {
                        echo "Error";
                    }
                    
                    
                
                }
                else
                {
                        

                        $retgivedate;

                        //convert string to object
                        $retgivedate = new DateTime($retgivedate);
                        $oretdate; //object returndate

                        // calculates the difference between DateTime objects 
                        $fixed = date_diff($oretdate,$retgivedate);

                        // printing result in days format 
                        $fain=$fixed->format('%R%a');
                        
                       
                        //if difference > =0 CONTINUE normal process

                        $totalfine = $fain * 5;

                        

                        $retmem = $getreturnresult['memberid'];
                        $retbookid = $getreturnresult['bookid'];

                        //update fine daily
                        $upfine = "UPDATE issuebook SET fine = '$totalfine' WHERE memberid = '$retmem' AND bookid = '$retbookid'";
                        $upfinequery = mysqli_query($mysqli,$upfine);


                        if($upfinequery)
                        {

                            echo'count stop';

                        }
                        else
                        {
                            echo "Error";
                        }                        
                        
                }             
            }
        }
    }
?>