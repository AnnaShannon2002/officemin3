<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1><hr>
        <?php
            if (isset($_SESSION['error'])) {
                echo "<em>" . $_SESSION['error'] . "</em>";
                unset($_SESSION['error']);
            }
        ?>
        <form action="new_user.php" method="post">
            Username: <input type="text" name="uname" required><br>
            Password: <input type="password" name="pwd" required><br>
            Repeat: <input type="password" name="repeat" required><br>
            <input type="submit"><br>
            <br><a href="index.php">Main Menu</a>
        </form>
    </body>
</html>
