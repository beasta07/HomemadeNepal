<?php
// (A) START SESSION
session_start();

// (B) LOGOUT REQUEST
if (isset($_POST["logout"])) {
    unset($_SESSION["user"]);
}

// (C) REDIRECT TO LOGIN PAGE IF NOT LOGGED IN
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta name="robots" content="noindex" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5" />
    <link rel="stylesheet" href="admin.css" />
</head>

<body>
    <!-- (A) SIDEBAR -->
    <div id="pgside">
        <!-- (A1) BRANDING OR USER -->
        <!-- LINK TO DASHBOARD OR LOGOUT -->
        <div id="pguser">
            <img src="potato.png" />
            <i class="txt">MY ADMIN</i>
        </div>


        <!-- (A2) MENU ITEMS -->
        <a href="admin.php" class="current">
            <i class="ico">&#9733;</i>
            <i class="txt">Sales</i>
        </a>
        <a href="Product.php">
            <i class="ico">&#9728;</i>
            <i class="txt">Product</i>
        </a>
        <a href="Category.php">
            <i class="ico">&#9737;</i>
            <i class="txt">Category</i>
        </a>
        <a href="#">
            <form method='post'>
                <input type="hidden" name="logout" value="1">
                <input type="submit" value="logout" />
            </form>

        </a>
    </div>

    <!-- (B) MAIN -->
    <main id="pgmain">
        <?php include('sales.php'); ?>
    </main>
</body>

</html>