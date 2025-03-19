<?php session_start();

// PHP null coalescing operator ?? (PHP 7.0+)
// Ensure that the user has a value. Guest is default. 
$user = $_SESSION['user'] ?? "Guest";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        Welcome, <?= $user ?>
        <p />
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "officemin";

        $con = mysqli_connect($servername, $username, $password, $dbname);
        if (!$con) {
            die('Could not connect: ' . mysqli_connect_error());
        }

        $result = mysqli_query($con, "select count(*) from items");

        $row = mysqli_fetch_array($result);

        // echo "If your server is running and you have created your database 
        //     correctly, you should see a count of 6 rows 
        //     here: $row[0] rows found. <b>Comment this out when done!</b>";

        mysqli_close($con);
        ?>

        <h2>Main Menu</h2>
        <ul>
            <li><a href="select.php">Read</a></li>
            <li><a href="insert.php">Create</a></li>
            <li><a href="delete.php">Delete</a></li>
            <li><a href="update.php">Update</a></li>
        </ul>
    </body>
</html>
