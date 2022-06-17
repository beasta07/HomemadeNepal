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
  <style>
    body {

      background-color: #ecf0f1;
    }

    h2 {

      text-align: center;
      font-size: 50px;
      font-family: "Caveat Brush"
    }

    image {
      flex: 1 1 45rem;
      float: left;

    }

    p {

      font-size: 19px;
      flex: 1 1 45rem;
      float: right;
    }

    .topnav {
      overflow: hidden;
      background-color: #2d3436;
    }

    .topnav a {
      float: left;
      color: #55efc4;
      text-align: center;
      padding: 20px 20px;
      text-decoration: none;
      font-size: 17px;
      align-items: center;
      font-family: 'Times New Roman', Times, serif;

    }

    .topnav a:hover {
      background-color: white;
      color: black;
    }

    .topnav a.active {
      background-color: #04AA6D;

    }

    .topnav {
      overflow: auto;
    }
  </style>
  </style>
</head>

<body>
  <ul class="topnav">
    <a href="sales.php">Sales</a>
    <a href="product.php">Products</a>
    <a href="category.php">Category</a>

  </ul>

  <div id="text">
    <h2>Welcome Admin</h2>
    <div class="image">
      <img src="img/admin_background.jpg" alt="">
    </div>

    <p>Welcome to the Admin page. Here you can upgrade the category and product of the foods you want and you can also check the past Sales made</>
  </div>
</body>


</p>
<form method='post'>
  <input type="hidden" name="logout" value="1">
  <input type="submit" value="logout" />
</form>

</html>