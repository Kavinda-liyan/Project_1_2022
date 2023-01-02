<?php

include('header.php');
require './PHP/dbcon.php';
$product = null;

if (isset($_GET['id'])) {
    $product_qry = mysqli_query($dbConnection, 'SELECT * FROM itemproducts where item_id = ' . $_GET['id'] . '');

    $product = $product_qry->fetch_assoc();
}

if ($product != null && isset($_POST['addToCart'])) {
    $stock_qry = mysqli_query($dbConnection, 'SELECT * from itemproducts where item_id = ' . $product['item_id'] . '');
    $stock_line = $stock_qry->fetch_assoc();

    if ($stock_line != null && $stock_line['quantity'] > 0) {
        $cart_qry = mysqli_query($dbConnection, 'SELECT * FROM cart where itemId = ' . $product['item_id'] . '');
        $currentItem = $cart_qry->fetch_assoc();
        if ($currentItem == null) {
            $dbConnection->query('INSERT INTO cart(itemId, quantity, userId) values(' . $product['item_id'] . ', 1, ' . $_SESSION['id'] . ')');
        } else {
            $dbConnection->query('UPDATE cart SET quantity=quantity+1 where itemId = ' . $product['item_id'] . ' and userId = ' . $_SESSION['id'] . '');
        }

        echo '<script>alert("Item added to the cart")</script>';
    } else {
        echo '<script>alert("Current item is not available")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRYSTAL TECH COMPUTERS</title>
    <link rel="stylesheet" href="style/aboutstyle.css">
    <link rel="stylesheet" href="style/productdetail.css">
    <link rel="stylesheet" href="style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>

<body class="bg-dark">
    <!--HEADER FROM HERE-->
    <div class="containermy">
        <div class="boxx1">
            <header>
                <img src="images/logo.png">
            </header>
        </div>
    </div>
    
    ?>
    <!--NAVIGATION FROM HERE-->
    <?php include('navbar.php') ?>
    <!--JAVA GRID IMAGES-->
    <div class="container">
        
        <div class=" m-auto containerp">
            <div class="row">
                <?php
                echo '<div class="col-md-12 my-3 ">';
                echo '<div class="items">
                            
                            <img src="http://localhost/ctcadmin/images/news/' . $product['cover'] . '" alt="' . $product['names'] . '" class="card-img-top rounded shadow p-3 mb-5 "/>
                            <hr>
                            <div class="items">
                              <h2 >' . $product['names'] . '</h4>                             
                              <h4><small><s class="text-secondary">Rs.' . $product['price'] . '.00</s></small></h5>
                              <h4 >Rs.' . $product['dprice'] . '.00</h5>
                              <p >' . $product['sdiscription'] . '</p>
                            </div>
                          </div>';
                echo '</div>';
                ?>
            </div>
            <?php
            echo '<form action="productdetail.php?id=' . $product['item_id'] . '" method="post">
            <button class="btn btn-primary my-2 atc"  type="submit" name="addToCart">Add To Cart</button>
            
          </form>';
            ?>
<?php include('rating.php') ?>
        </div>
        <!-- COMMENT -->
        
        <section style="background-color: #eee;">
  <div class="container my-5 py-5 bg-dark">
    <div class="row d-flex justify-content-center " style="border-color: #fff;">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card card text-light bg-dark" style="border-color: #fff;">
          <div class="card-body card text-light bg-dark" >
        
            <p class="mt-3 mb-4 pb-2">
            If you have any questions about this product, please ask in the comment section below!
            </p>

            
          </div>
          <?php
        
          if (isset($_SESSION['id'])) {
            if (isset($_GET['id'])) {
              $product_qry = mysqli_query($dbConnection, 'SELECT * FROM itemproducts where item_id = ' . $_GET['id'] . '');
          
              $product = $product_qry->fetch_assoc();
          }

              $userid = $_SESSION['id'];
              echo '
          <form method="Post" action="comments.php">

          <div class="card-footer py-3 border-0 card text-light bg-dark" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              
              <div class="form-outline w-100">
              <input type="hidden" name="user" value="'.$userid.'">
              <input type="hidden" name="itemid" value="'.$product['item_id'].'">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;" name="question" placeholder="Enter Your Questions" required></textarea>
              </div>
            </div>
            <div class="float-end mt-2 p-1 m-1">
              <button type="submit" name="addfaq" class="btn btn-primary btn-sm">Post comment</button>
            </div>
          </div>
          
          <form>';
          
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
        <!-- Recent Comment -->

<section>
          <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
              <div class="col-md-12 col-lg-10">
                <div class="card text-light bg-dark" style="border-color: #fff;">
                  <div class="card-body p-4">
                    <h4 class="mb-0">Recent comments</h4>
                    <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
                    <?php

$faq_qry = ('SELECT * FROM faq f JOIN userreg u ON f.userid= u.id JOIN itemproducts i ON i.item_id = f.itemid WHERE itemid = '.$product['item_id'].' ORDER BY f.cid DESC');
$squery = mysqli_query($dbConnection,$faq_qry);
$faq_qry= mysqli_num_rows($squery);

if($faq_qry > 0)
{
   while ($ser = mysqli_fetch_array($squery)) 
   {

    echo '
    <div class="d-flex flex-start">
                  <div>
                    <h6 class="fw-bold mb-1">'.$ser["userName"].'</h6>
                    <div class="d-flex align-items-center mb-3">
                      
                    </div>
                    <p class="mb-0">
                    '.$ser["msg"].'
                    </p>
    
                    <div class="container">
                        <hr>
                        <section>
                            <div class="container">
                            <div>
                    <h6 class="fw-bold mb-1" style="color:red;">ADMIN</h6>
                    <div class="d-flex align-items-center mb-3">
                      
                    </div>
                    <p class="mb-0" style="color:red;">';
                    if($ser["reply"] == null){
                        echo "No reply yet.";
                    }else{
                        echo ''.$ser["reply"].'';
                    }
                   echo'   
                    </p>
                            </div>
                        </section>
    
    
                    </div>
                  </div>
                </div>
    ';
    
   
   
} 

}


?>
                    
                  </div>
        
                  <hr class="my-0" />
        
                  
                </div>
              </div>
            </div>
          </div>
        </section>
        
    </div>



    <footer class="bg-dark text-center text-lg-start opacity-75">
        <!-- Copyright -->
        <div class="text-light text-center p-3" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
            © 2022 Copyright:
            <a class="text-light" href="#">CRYSTAL TECH COMPUTERS</a>
            | ProjectCconcept
        </div>
        <!-- Copyright -->
    </footer>

    <!--Login -->
<!-- --JAVA -->
<script>
$(document).ready(function(){
   //create variable
   var counts = 0;
   $(".atc").click(function () {
   //to number and increase to 1 on each click
      counts += +1;
      $(".cart-counter").animate({
   //show span with number
                opacity: 1
            }, 300, function () {
   //write number of counts into span
                $(this).text(counts);
            });
        }); 
});
</script>

    <!--JAVA SCRIPT FROM HERE-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>