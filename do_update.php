<?php session_start();
// TODO: make sure no one can access this page without logging in first
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
}

// TODO: validate the input data and place each value into the appropriate
// variable so that the UPDATE below will work properly
if (!isset($_POST['id'], $_POST['brand'], $_POST['product'], $_POST['price']) || !is_numeric($_POST['id'])) {
    die("Invalid input.");
}

$id = $_POST['id'];
$brand = $_POST['brand'];
$product = $_POST['product'];
$price = $_POST['price'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "officemin";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$sql = "UPDATE items SET brand = ?, product = ?, price = ? WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ssdi", $brand, $product, $price, $id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Update successful!";
} else {
    echo "No changes made or item not found.";
}

mysqli_stmt_close($stmt);
mysqli_close($con);

header("location:index.php");

