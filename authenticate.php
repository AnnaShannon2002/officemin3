<?php session_start();

include "validate.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "officemin";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$uname = test_input($_POST['uname']);
$pwd = test_input($_POST['pwd']);

if (!empty($uname) && !empty($pwd)) {
    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pwd'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['user'] = $uname;
        mysqli_close($con);
        header("location: index.php");
        exit;
    }
}

mysqli_close($con);
?>
<!--<p>Basically, the code below displays to the user if the credentials are wrong.</p>-->
<!DOCTYPE html>
<html>
    <body>
        Invalid username and/or password.<br>
        <a href="index.php">Main Menu</a>
    </body>
</html>
