<?php
session_start();

$user = $_SESSION['user'] ?? "Guest";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "officemin";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$result = mysqli_query($con, "SELECT * FROM items");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Select Page</title>
    </head>
    <body>
        <!--<p>TODO: display items table here.</p>-->
        <?php
        echo "<h1>Results:</h1><hr><br>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " | Brand: " . $row["brand"] . " | Product: " . $row["product"] . " | Price: " . $row["price"] . "<br><br>";
            }
        } else {
            echo "No items found";
        }

        $con->close();
        ?>

        <a href="index.php">Main Menu</a>
    </body>
</html>
