<?php
session_start();

// TODO: make sure no one can access this page without logging in first
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
}

$id = $_POST['id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Display for Update</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "officemin";
        
        $con = mysqli_connect($servername, $username, $password, $dbname);
        if (!$con) {
            die('Could not connect: ' . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM items where id = '" . $id . "'";
        $result = $con->query($sql);

        if ($row = mysqli_fetch_assoc($result)) {
            $brand = htmlspecialchars($row['brand']);
            $product = htmlspecialchars($row['product']);
            $price = htmlspecialchars($row['price']);
        } else {
            echo "Item with ID $id not found.";
            mysqli_close($con);
            exit;
        }
        
        ?>
        <form name="f" action="do_update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" >
            <label ><?php echo $id; ?></label><br/>
            Brand: <input type="text" name="brand" value="<?= $brand ?>"><br/>
            Product: <input type="text" name="product" value="<?php echo $product; ?>"><br/>
            Price: <input type="text" name="price" value="<?php echo $price; ?>"><br/>
            <br/>
            <input type="submit" value="Update">
        </form>

    </body>
</html>
