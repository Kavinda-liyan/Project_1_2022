<?php
include('header.php');

use Stripe\Checkout\Session;
use Stripe\Stripe;

require 'vendor/autoload.php';
require './PHP/dbcon.php';

header('Content-Type: application/json');
Stripe::setApiKey('sk_test_51ME94aSBMFK6ihDc7OdNrNFsNuqlzuKVskX8VfQdaxVvJ1WDGZiUEc1kryKHDyqESHzcmjLYoItHEwB4PPYRiXs300WD2GSrNB');

if (isset($_POST['buyNow'])) {
  $total_qry = mysqli_query($dbConnection, 'SELECT SUM(c.quantity) total, SUM(c.quantity * i.dprice) totalAmount 
                          FROM cart c 
                          INNER JOIN itemproducts i ON c.itemId = i.item_id where userId = ' . $_SESSION['id'] . '');

  $product_qry = mysqli_query($dbConnection, 'SELECT i.* FROM cart c inner join itemproducts i ON c.itemId = i.item_id WHERE userId = ' . $_SESSION['id'] . ' LIMIT 1');

  $product = $product_qry->fetch_assoc();

  $total_qty_row = $total_qry->fetch_assoc();

  $total_qty = 0;
  $total_amount = 0.00;

  $domain_url = $_SERVER['SERVER_NAME'];

  if ($total_qty_row != null) {
    $total_qty = $total_qty_row['total'];
    $total_amount = $total_qty_row['totalAmount'];
  }

  $checkout_session = Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'lkr',
        'unit_amount' =>  $total_amount  + 250,
        'product_data' => [
          'name' => $product['names'],
          'description' => $product['sdiscription']
        ],
      ],
      'quantity' => $total_qty  ,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/crystaltechcomputers/cart.php?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => 'http://localhost/crystaltechcomputers/cancel.html',
  ]);

  header("HTTP/1.1 303 See Other");
  header("Location: " . $checkout_session->url);
}
