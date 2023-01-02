<?php
$details = array();
$all = array();
$catId = $_POST['catId'];

$mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli));
$sql = "SELECT * FROM itemproducts i JOIN category c on i.category=c.cat_id AND c.cat_id='$catId'";
$result = mysqli_query($mysqli, $sql);

while ($row = mysqli_fetch_array($result)) {
    $details[0] = $row["names"];
    $details[1] = $row["sdiscription"];
    $details[2] = $row["price"];
    $details[3] = $row["dprice"];
    $details[4] = $row["quantity"];
    $details[2] = $row["cover"];


    $all[0] = $details;
}

print_r($all);

?> 