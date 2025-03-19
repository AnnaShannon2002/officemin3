<?php session_start() ?>
<?php
if (isset($_SESSION['user'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>You must login before making changes.</h1><hr>
        <form action="authenticate.php" method="post">
            Username: <input type="text" name="uname"><br>
            Password: <input type="password" name="pwd"><br>
            Repeat: <input type="password" name="repeat"><br> 
            <input type="submit">
        </form>
        <br>New user?
        <a href="register.php">Register here!</a>
    </body>
</html>
