<?php
// (A) LOGIN CHECKS
require "check.php";

// (B) LOGIN PAGE HTML 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link href="login.css" rel="stylesheet">
</head>

<body>
    <?php if (isset($failed)) { ?>
        <div id="bad-login">Invalid email or password.</div>
    <?php } ?>

    <form id="login-form" method="post" target="_self">
        <h1>ADMIN LOGIN</h1>
        <label for="user">User</label>
        <input type="text" name="user" required />
        <label for="password">Password</label>
        <input type="password" name="password" required />
        <input type="submit" value="Sign In" />
    </form>
</body>

</html>