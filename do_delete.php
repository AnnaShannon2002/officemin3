<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Results</title>
    </head>
    <body>
        <?php
        // TODO: write delete code here (rows)
        session_start();

        if (!isset($_SESSION['user'])) {
            header("location: login.php");
            exit;
        }

        $conn = new mysqli("localhost", "root", "", "officemin");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $brand = $_POST['brand'];

        $brand = htmlspecialchars($brand);

        $sql_check = "SELECT * FROM items WHERE brand = '$brand'";
        $result = $conn->query($sql_check);

        if ($result->num_rows > 0) {
            $sql_delete = "DELETE FROM items WHERE brand = '$brand'";

            if ($conn->query($sql_delete) === TRUE) {
                echo "Successfully deleted.<br>";
            } else {
                echo "Error: " . $conn->error;
                echo "<br><a href='delete.php'>Return</a><br>";
            }
        } else {
            // If the brand doesn't exist
            echo "Invalid brand name.";
            echo "<br><a href='delete.php'>Please try again</a><br>";
        }
        
        $conn->close();
        ?>
        
        <a href="index.php">Main Menu</a>
    </body>
</html>
