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
  <link rel="stylesheet" type="text/css" href="../css/report.css"
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

</head>

<body>
    <section id="report">
    <div class="container">
  <?php

  $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

  if( isset($_POST['check'])){
  
     $month = $_POST['month'];
  
     $year = $_POST['year'];

     //convert month num to name
     $month_name = date("F", mktime(0, 0, 0, $month, 10)); 

    echo' <h1>SipSewana <span>Library</span><h1><h2> Monthly Report</h2>
          <h3>'.$month_name.' of '.$year.'</h3><br><br>
          <h4><b>Added Books</b></h4>';

     //get monthly books count
     $books = "SELECT COUNT(book_id) as book, sum(quantity) as quantity FROM addbook WHERE month(add_date)='$month' AND year(add_date)='$year'";
     $books_query= mysqli_query($mysqli, $books);

     $books_result = mysqli_fetch_assoc($books_query);
     $countbook = $books_result['book'];
     $countquan = $books_result['quantity'];

     echo '<p>'.$countbook.' books are added to the library';
     if($countbook==0)
     {echo'</p>';}
     else
     {
     echo ' with quantity of '.$countquan.'  in this month.</p><br>';
     }
  
    //get monthly books table details
    $book = "SELECT * FROM addbook WHERE month(add_date)='$month' AND year(add_date)='$year'";
    $book_query= mysqli_query($mysqli, $book);
    $book_num = mysqli_num_rows($book_query);

    //insert data into RETURN table

    if($book_num>0)
    {
        echo '<div class="table-responsive">  
                <table id="issue_data" class="table table-striped table-bordered">  
                <thead>  
                <tr>  
                    <td>Book ID</td>  
                    <td>Title</td>
                    <td>Author</td>
                    <td>ISBN Number</td>  
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Added Date</td>
                    
                </tr>  
                </thead> '; 
        
        while ( $book_result = mysqli_fetch_assoc($book_query))  
        {  
            echo '  
            <tr>  
                    <td>'.$book_result["book_id"].'</td>  
                    <td>'.$book_result["title"].'</td>  
                    <td>'.$book_result["author"].'</td>
                    <td>'.$book_result["isbn"].'</td>
                    <td>'.$book_result["quantity"].'</td>
                    <td>Rs.'.$book_result["price"].'</td>
                    <td>'.$book_result["add_date"].'</td>';
                       
            echo'   </tr>  '; 
            
        }  
        
        echo '</table>  
        </div>';   
        }
        else
        {
        echo '<h6><i class="fa fa-certificate"></i> &nbsp;Doesnt have Record.</h6>';

        }
  
  
    
    echo'<br><br><br>';


    //////////////////////////////////issued books this month////////////////////////////////////////////////////////////////////////////

    echo'<h4><b>Issued Books</b></h4>';

    //get monthly books count
    $issuebooks = "SELECT COUNT(returndate) as issuedate FROM issuebook WHERE month(returndate)='$month' AND year(returndate)='$year' AND completedate IS NULL AND returndate IS NOT NULL";
    $issuebooks_query= mysqli_query($mysqli, $issuebooks);

    $issuebooks_result = mysqli_fetch_assoc($issuebooks_query);
    $issuecountbook = $issuebooks_result['issuedate'];

    echo '<p>'.$issuecountbook.' books issued this month</p><br>'; 

    //get monthly books table details
    $issuebook = "SELECT    i.memberid,
                            u.fullname,
                            i.bookid,
                            b.title,
                            i.issuedate,
                            i.returndate
                            
                            FROM
                            issuebook i
                            INNER JOIN
                            user_register u ON i.memberid = u.`mem-id`
                            INNER JOIN
                            addbook b ON i.bookid = b.book_id WHERE month(returndate)='$month' AND year(returndate)='$year' AND completedate IS NULL AND returndate IS NOT NULL";
    $issuebook_query= mysqli_query($mysqli, $issuebook);
    $issuebook_num = mysqli_num_rows($issuebook_query);

    //insert data into RETURN table

    if($issuebook_num>0)
    {
    echo '<div class="table-responsive">  
            <table id="issue_data" class="table table-striped table-bordered">  
            <thead>  
            <tr>
                <td>Member ID</td>
                <td>Member Name</td>    
                <td>Book ID</td>
                <td>Book Name</td>  
                <td>Issued Date</td>
                <td>Return Date</td>
                
            </tr>  
            </thead> '; 
    
    while ( $issuebook_result = mysqli_fetch_assoc($issuebook_query))  
    {  
        echo '  
        <tr>
                <td>'.$issuebook_result["memberid"].'</td>
                <td>'.$issuebook_result["fullname"].'</td>  
                <td>'.$issuebook_result["bookid"].'</td>  
                <td>'.$issuebook_result["title"].'</td>  
                <td>'.$issuebook_result["issuedate"].'</td>
                <td>'.$issuebook_result["returndate"].'</td>';
                    
        echo'   </tr>  '; 
        
    }  
    
    echo '</table>  
    </div>';   
    }
    else
    {

    }


    
    echo'<br><br>';

    //////////////////////////////////returned books this month////////////////////////////////////////////////////////////////////////////

    echo'<h4><b>Returned Books</b></h4>';

    //get monthly books count
    $returnbooks = "SELECT COUNT(completedate) as returndate FROM issuebook WHERE month(completedate)='$month' AND year(completedate)='$year' AND completedate IS NOT NULL";
    $returnbooks_query= mysqli_query($mysqli, $returnbooks);

    $returnbooks_result = mysqli_fetch_assoc($returnbooks_query);
    $returncountbook = $returnbooks_result['returndate'];

    echo '<p>'.$returncountbook.' books returned this month</p><br>'; 

    //get monthly books table details
    $returnbook = "SELECT   i.memberid,
                            u.fullname,
                            i.bookid,
                            b.title,
                            i.issuedate,
                            i.returndate,
                            i.completedate
                            
                            FROM
                            issuebook i
                            INNER JOIN
                            user_register u ON i.memberid = u.`mem-id`
                            INNER JOIN
                            addbook b ON i.bookid = b.book_id WHERE month(completedate)='$month' AND year(completedate)='$year' AND completedate IS NOT NULL";
    $returnbook_query= mysqli_query($mysqli, $returnbook);
    $returnbook_num = mysqli_num_rows($returnbook_query);

    //insert data into RETURN table

    if($returnbook_num>0)
    {
    echo '<div class="table-responsive">  
            <table id="issue_data" class="table table-striped table-bordered">  
            <thead>  
            <tr>
                <td>Member ID</td>
                <td>Member Name</td>    
                <td>Book ID</td>
                <td>Book Name</td>  
                <td>Issued Date</td>
                <td>Due Return Date</td>
                <td>Returned Date</td>
                
            </tr>  
            </thead> '; 
    
    while ( $returnbook_result = mysqli_fetch_assoc($returnbook_query))  
    {  
        echo '  
        <tr>
                <td>'.$returnbook_result["memberid"].'</td>
                <td>'.$returnbook_result["fullname"].'</td>  
                <td>'.$returnbook_result["bookid"].'</td>  
                <td>'.$returnbook_result["title"].'</td>  
                <td>'.$returnbook_result["issuedate"].'</td>
                <td>'.$returnbook_result["returndate"].'</td>
                <td>'.$returnbook_result["completedate"].'</td>';
                    
        echo'   </tr>  '; 
        
    }  
    
    echo '</table>  
    </div>';   
    }
    else
    {

    }


    
    echo'<br><br>';



        //////////////////////////////////fine details this month////////////////////////////////////////////////////////////////////////////

        echo'<h4><b>Fine Collected</b></h4>';

        //get monthly books count
        $finebooks = "SELECT COUNT(payday) as payday, sum(fine) as fine FROM issuebook WHERE month(payday)='$month' AND year(payday)='$year' AND payday IS NOT NULL";
        $finebooks_query= mysqli_query($mysqli, $finebooks);
    
        $finebooks_result = mysqli_fetch_assoc($finebooks_query);
        $finecountbook = $finebooks_result['payday'];
        $finesum = $finebooks_result['fine'];
    
        echo '<p>Fine collected from '.$finecountbook.' members this month.<br>'; 

        if($finecountbook==0)
        {echo'</p>';}
        else
        {
        
        echo 'Total fine is Rs.'.$finesum.'</p><br>'; 
        }
        //get monthly books table details
        $finebook = "SELECT   i.memberid,
                                u.fullname,
                                i.bookid,
                                b.title,
                                i.returndate,
                                i.completedate,
                                i.fine
                                
                                FROM
                                issuebook i
                                INNER JOIN
                                user_register u ON i.memberid = u.`mem-id`
                                INNER JOIN
                                addbook b ON i.bookid = b.book_id WHERE month(payday)='$month' AND year(payday)='$year' AND payday IS NOT NULL";
        $finebook_query= mysqli_query($mysqli, $finebook);
        $finebook_num = mysqli_num_rows($finebook_query);
    
        //insert data into RETURN table
    
        if($finebook_num>0)
        {
        echo '<div class="table-responsive">  
                <table id="issue_data" class="table table-striped table-bordered">  
                <thead>  
                <tr>
                    <td>Member ID</td>
                    <td>Member Name</td>    
                    <td>Book ID</td>
                    <td>Book Name</td>  
                    <td>Due Return Date</td>
                    <td>Returned Date</td>
                    <td>Fine</td>
                    
                </tr>  
                </thead> '; 
        
        while ( $finebook_result = mysqli_fetch_assoc($finebook_query))  
        {  
            echo '  
            <tr>
                    <td>'.$finebook_result["memberid"].'</td>
                    <td>'.$finebook_result["fullname"].'</td>  
                    <td>'.$finebook_result["bookid"].'</td>  
                    <td>'.$finebook_result["title"].'</td> 
                    <td>'.$finebook_result["returndate"].'</td>
                    <td>'.$finebook_result["completedate"].'</td>
                    <td>Rs.'.$finebook_result["fine"].'</td>';
                        
            echo'   </tr>  '; 
            
        }  
        
        echo '</table>  
        </div>';   
        }
        else
        {
    
        }
    
    
        
        echo'<br><br>';


    //////////////////////////////////lost books payment this month////////////////////////////////////////////////////////////////////////////

    echo'<h4><b>Penalty For Lostbooks</b></h4>';

    //get monthly books count
    $lostbooks = "SELECT COUNT(paid_date) as pay,sum(price) as price FROM lostbook WHERE month(paid_date)='$month' AND year(paid_date)='$year' AND paid_date IS NOT NULL";
    $lostbooks_query= mysqli_query($mysqli, $lostbooks);

    $lostbooks_result = mysqli_fetch_assoc($lostbooks_query);
    $lostcountbook = $lostbooks_result['pay'];
    $lostsum = $lostbooks_result['price'];

    echo '<p>'.$lostcountbook.' members paid the peanlty for lostbooks.<br>'; 
    if($lostcountbook==0)
    {echo'</p>';}
    else
    {
    echo 'Total lostbook penalty is Rs.'.$lostsum.'</p><br>'; 
    }
    //get monthly books table details
    $lostbook = "SELECT     l.memberid,
                            u.fullname,
                            l.bookid,
                            b.title,
                            l.price,
                            l.paid_date
                            
                            FROM
                            lostbook l
                            INNER JOIN
                            user_register u ON l.memberid = u.`mem-id`
                            INNER JOIN
                            addbook b ON l.bookid = b.book_id WHERE month(paid_date)='$month' AND year(paid_date)='$year' AND paid_date IS NOT NULL";
    $lostbook_query= mysqli_query($mysqli, $lostbook);
    $lostbook_num = mysqli_num_rows($lostbook_query);

    //insert data into RETURN table

    if($lostbook_num>0)
    {
    echo '<div class="table-responsive">  
            <table id="issue_data" class="table table-striped table-bordered">  
            <thead>  
            <tr>
                <td>Member ID</td>
                <td>Member Name</td>    
                <td>Book ID</td>
                <td>Book Name</td>  
                <td>Book Price Penalty</td>
                <td>Paid Date</td>
                
            </tr>  
            </thead> '; 
    
    while ( $lostbook_result = mysqli_fetch_assoc($lostbook_query))  
    {  
        echo '  
        <tr>
                <td>'.$lostbook_result["memberid"].'</td>
                <td>'.$lostbook_result["fullname"].'</td>  
                <td>'.$lostbook_result["bookid"].'</td>  
                <td>'.$lostbook_result["title"].'</td>  
                <td>Rs.'.$lostbook_result["price"].'</td>
                <td>'.$lostbook_result["paid_date"].'</td>';
                    
        echo'   </tr>  '; 
        
    }  
    
    echo '</table>  
    </div>';   
    }
    else
    {

    }


    
    echo'<br><br>';


    //////////////////////////////////Member Joined////////////////////////////////////////////////////////////////////////////

    echo'<h4><b>Members Registered</b></h4>';

    //get monthly books count
    $members = "SELECT COUNT(fullname) as fullname FROM user_register WHERE month(register_date)='$month' AND year(register_date)='$year'";
    $members_query= mysqli_query($mysqli, $members);

    $members_result = mysqli_fetch_assoc($members_query);
    $memberscount = $members_result['fullname'];

    echo '<p>'.$memberscount.' members registered this month.</p><br>'; 

    //get monthly books table details
    $member = "SELECT * FROM user_register WHERE month(register_date)='$month' AND year(register_date)='$year'";
    $member_query= mysqli_query($mysqli, $member);
    $member_num = mysqli_num_rows($member_query);

    //insert data into RETURN table

    if($member_num>0)
    {
    echo '<div class="table-responsive">  
            <table id="issue_data" class="table table-striped table-bordered">  
            <thead>  
            <tr>
                <td>Member ID</td>
                <td>Member Name</td>    
                <td>Email</td>
                <td>Registered Date</td>  
                
            </tr>  
            </thead> '; 
    
    while ( $member_result = mysqli_fetch_assoc($member_query))  
    {  
        echo '  
        <tr>
                <td>'.$member_result["mem-id"].'</td>
                <td>'.$member_result["fullname"].'</td>  
                <td>'.$member_result["email"].'</td>  
                <td>'.$member_result["register_date"].'</td>';
                    
        echo'   </tr>  '; 
        
    }  
    
    echo '</table>  
    </div>';   
    }
    else
    {

    }


    }
    echo'<br><br><br>';



  ?>
    <a class="btn btn-primary" href="../Dashboard.php">Go Back</a>
  <button class="btn btn-primary" onClick="window.print()">Generate Pdf</button><br><br><br>
  </div>

  </section>

  
  
  
  
    <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
