<?php
include('header.php');
require './PHP/dbcon.php';

$total_qry = mysqli_query($dbConnection, 'SELECT SUM(c.quantity) total, SUM(c.quantity * i.dprice) totalAmount 
                          FROM cart c 
                          INNER JOIN itemproducts i ON c.itemId = i.item_id where userId = ' . $_SESSION['id'] . '');


$total_qty_row = $total_qry->fetch_assoc();

$total_qty = 0;
$total_amount = 0.00;

if ($total_qty_row != null) {
  $total_qty = $total_qty_row['total'];
  $total_amount = $total_qty_row['totalAmount'];
}

if (isset($_GET['itemId'])) {
  if ($dbConnection->query('DELETE FROM cart WHERE itemId=' . $_GET['itemId'] . ' AND userId=' . $_SESSION['id'] . '')) {
    echo '<script>alert("Item removed!")</script>';
    header('location:../cart.php');
  }
}

if (isset($_GET['session_id'])) {
  try {
    $dbConnection->begin_transaction();

    $dbConnection->query('INSERT INTO `order`(`userId`, `lineTotal`, `shippingCost`) VALUES(' . $_SESSION['id'] . ', '. $total_amount .', 250)');

    $order_id_query = mysqli_query($dbConnection, 'SELECT `id` FROM `order` ORDER BY `id` DESC LIMIT 1');
    
    $order_id = $order_id_query->fetch_assoc()['id'];
    
    $cart_items_query = mysqli_query($dbConnection, 'SELECT * FROM cart WHERE userId = ' . $_SESSION['id'] . '');
    
    $dbConnection->query('INSERT INTO orderline(itemId, orderId, quantity, total, unitPrice)
    SELECT c.itemId, ' . $order_id . ', c.quantity, c.quantity * i.price, i.price 
    FROM cart c
    INNER JOIN itemproducts i ON c.itemId = i.item_id
    WHERE c.userId = ' . $_SESSION['id'] . '');

    while ($row = mysqli_fetch_assoc($cart_items_query)) {
      $item_query = mysqli_query($dbConnection, 'SELECT * FROM itemproducts WHERE item_id = ' . $row['itemId'] . '');
      $item_row = $item_query->fetch_assoc();

      if ($item_row == null || $item_row['quantity'] < $row['quantity']) {
        throw new Exception('Not enough stock for ' . $item_row['names'] . ' item.');
      } else {
        $dbConnection->query('UPDATE itemproducts SET quantity = quantity - ' . $row['quantity'] . ' WHERE item_id = ' . $row['itemId'] . '');
      }
    }

    $dbConnection->query('DELETE FROM cart WHERE userId='.$_SESSION['id'].'');

    $dbConnection->commit();
  } catch (Throwable $e) {
    $dbConnection->rollback();
    echo '<script>alert("' . $e->getMessage() . '")</script>';
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
  <title>Store</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark">
  <!--HEADER FROM HERE-->
  <div class="containermy">
    <div class="boxx1">
      <header>
        <img src="Images/logo.png">
      </header>
    </div>
  </div>
  <!--NAVIGATION FROM HERE-->
  <!--NAVIGATION FROM HERE-->
  <?php include('navbar.php') ?>
  <!--CART FROM HERE-->

  <div class="cart">
    <hr class="m-3" style="color: aliceblue;">
    <h1><span style="color: red;">C</span>ART <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart " viewBox="0 0 16 16" style="color: red; ">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </svg></h1>
    <hr class="m-3" style="color: aliceblue;">

  </div>
  <div class="container">
    <!-- <section>
      <div class="container">
        <nav class="navbar navbar-light  justify-content-between" style="color: aliceblue;">
          <a class="a navbar-brand">Items(00)</a>
          <a class="a navbar-brand mr-sm-2"><span class="glyphicon glyphicon-trash"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
              </svg></span> Delete</a>

        </nav>
      </div>
    </section> -->
    <hr class="m-3" style="color: aliceblue;">
    <!--items-->
    <section class="h-100 h-custom m-1" style="background-color: rgba(255, 255, 255, 0.125); border-radius: 1rem;">
      <div class="container py-5 h-100 con">
        <div class="row d-flex justify-content-center align-items-center h-100 ">
          <div class="col">
            <div class="card">
              <div class="card-body p-4">

                <div class="row">

                  <div class="col-lg-8">
                    <h5 class="mb-3"><a href="store.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to Store</a></h5>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <div>

                        <p class="mb-0">You have (<?php echo $total_qty ?? 0 ?>) items in your cart</p>
                      </div>

                    </div>
                    <?php
                    $cart_items_qry = mysqli_query($dbConnection, 'SELECT * FROM cart c 
                                         INNER JOIN itemProducts i on c.itemId = i.item_id WHERE c.userId = ' . $_SESSION['id'] . '');
                    while ($row = mysqli_fetch_assoc($cart_items_qry)) {
                      $item_total_qry = mysqli_query($dbConnection, 'SELECT SUM(quantity) total FROM cart where userId = ' . $_SESSION['id'] . ' and itemId = ' . $row['itemId'] . '');

                      $item_total_row = $item_total_qry->fetch_assoc();

                      $item_total = 0;

                      if ($item_total_row != null) {
                        $item_total = $item_total_row['total'];
                      }

                      echo '<div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img src="http://localhost/ctcadmin/images/news/' . $row['cover'] . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 200;">
                            </div>
                            <div class="ms-3">
                              <h5>' . $row['names'] . '</h5>
                              <p class="small mb-0">' . $row['sdiscription'] . '</p>
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                              <h2 class="fw-normal mb-0">(' . $item_total . ')</h2>
                            </div>
                            <div style="width: 150px;">
                              <h5 class="mb-0">Rs.' . $row['dprice'] . '</h5>
                            </div>
                            <button type="button" onclick="deleteItem(' . $row['itemId'] . ')"><i class="fas fa-trash-alt"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>';
                    }
                    ?>
                    <!-- <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img src="Images/Cardshop.png" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                              <h5>Product</h5>
                              <p class="small mb-0">Product Details</p>
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                              <h5 class="fw-normal mb-0">(00)</h5>
                            </div>
                            <div style="width: 150px;">
                              <h5 class="mb-0">Rs.00000.00</h5>
                            </div>
                            <a href="#!" style="color: #000000;"><i class="fas fa-trash-alt"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img src="Images/Cardshop.png" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                              <h5>Product</h5>
                              <p class="small mb-0">Product Details</p>
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                              <h5 class="fw-normal mb-0">(00)</h5>
                            </div>
                            <div style="width: 150px;">
                              <h5 class="mb-0">Rs.00000.00</h5>
                            </div>
                            <a href="#!" style="color: #000000;"><i class="fas fa-trash-alt"></i></a>
                          </div>
                        </div>
                      </div>
                    </div> -->

                  </div>

                  <div class="col-lg-4" style="background-color: #00000038; border-radius: 1rem;">
                    <hr class="my-3">

                    <h4>Products : Rs. <?php echo number_format($total_amount, 2) ?? '0.00' ?></h4>
                    <h4>Shipping : Rs. <?php echo $total_amount > 0 ? '250.00' : '0.00' ?></h4>
                    <hr class="my-3">
                    <h4>Total : Rs. <?php echo $total_amount > 0 ? number_format($total_amount + 250, 2) : '0.00' ?></h4>
                    <hr class="my-3">
                    <hr class="my">
                    <form action="create-checkout-session.php" method="post" name="buy">
                      <button type="submit" class="buttons" name="buyNow">Buy Now</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>



  <script>
    function deleteItem(itemId) {
      var url = window.location.href;

      if (window.confirm('Are you sure?')) {
        window.location.href = url + `/delete?itemId=${itemId}`;
      }
    }
  </script>

  <!--JAVA GRID IMAGES-->

  <!-- Copyright -->
  <div class="text-light text-center p-3 align-baseline" style="background-color: rgba(160, 160, 160, 0.125); font-weight: bold;">
    © 2022 Copyright:
    <a class="text-light" href="#">CRYSTAL TECH COMPUTERS</a>
    | ProjectCconcept
  </div>
  <!-- Copyright -->
  <!--JAVA SCRIPT FROM HERE-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>