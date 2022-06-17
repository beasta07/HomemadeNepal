<?php include('header.php');
$purchaseid = $_GET['purchaseid'];
$status = $_GET['status'];
$updatequery1 = "UPDATE purchase SET status=$status WHERE purchaseid=$purchaseid ";
mysqli_query($conn, $updatequery1);
header('location:sales.php');
