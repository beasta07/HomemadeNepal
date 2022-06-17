<?php

// Connect to database 
$con = mysqli_connect("localhost", "root", "", "fastfood");

// Check if id is set or not, if true,
// toggle else simply go back to the page
if (isset($_GET['purchaseid'])) {

    // Store the value from get to 
    // a local variable "sales_id"
    $purchase_id = $_GET['purchaseid'];

    // SQL query that sets the status to
    // 0 to indicate deactivation.
    $sql = "UPDATE `purchase` SET 
            `status`=0 WHERE purchaseid='$purchase_id'";

    // Execute the query
    mysqli_query($con, $sql);
}

// Go back to sales-page.php
header('location: admin.php');
