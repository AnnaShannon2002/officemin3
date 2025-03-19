<?php

// TODO: insert data gathered from the insert.php form into the database

// after the insert send the user back to the main menu

session_start();
include "validate.php";

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "officemin");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$brand = test_input($_POST['brand']);
$product = test_input($_POST['product']);
$price = test_input($_POST['price']);

$sql = "INSERT INTO items (brand, product, price) VALUES ('$brand', '$product', '$price')";

if ($conn->query($sql) === TRUE) {
    header("location: index.php");
    exit;
} else {
    header("location: insert.php");
    exit;
}
$conn->close();
