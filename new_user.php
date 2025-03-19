<?php session_start();

// define variables and set to empty values
$form_username = $pwd = $repeat = "";

include "validate.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "officemin";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// TODO: make sure that pwd and repeat match.  If they don't match, send the 
// user back to the form with an appropriate error message.
$uname = test_input($_POST['uname']);
$pwd = test_input($_POST['pwd']);
$repeat = test_input($_POST['repeat']);

if ($pwd !== $repeat) {
    $_SESSION['error'] = "Passwords do not match.";
    header('Location: register.php');
    exit();
}

// TODO: make sure that the new user is not already in the database.  If the
// new username has already been used, send the user back to the form with an 
// appropriate error message.
// HINT: SELECT * FROM users where username = '$uname'
$sql = "SELECT * FROM users WHERE username = '$uname'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = "Username already taken.";
    mysqli_close($con);
    header('Location: register.php');
    exit();
}

// TODO: insert the new user into the database
// HINT: INSERT INTO users(username, password) VALUES('$uname', '$repeat')
$sql = "INSERT INTO users (username, password) VALUES ('$uname', '$pwd')";
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header("location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

// TODO: close the database connection
mysqli_close($con);

// if we made it here, we have a new user; send them to the homepage
header("location:index.php");
exit;
