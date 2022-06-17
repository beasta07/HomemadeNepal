<?php include('conn.php');
$purchaseid = $_GET('purchaseid');
$status = $_GET['status'];
$q = "update doctor_info set status=$status where purchaseid=id";
mysqli_query($conn, $q);
header('location:sales.php');
