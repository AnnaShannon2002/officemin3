<?php session_start();

include "validate.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "officemin";

$uname = test_input($_POST['uname']);
$pwd = test_input($_POST['pwd']);

if (!empty($uname) && !empty($pwd)) {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pwd, $row['password'])) {
            $_SESSION['user'] = $uname;
            mysqli_close($conn);
            header("location: index.php");
            exit;
        }
    }

mysqli_close($conn);
}
?>
<!--<p>Basically, the code below displays to the user if the credentials are wrong.</p>-->
<!DOCTYPE html>
<html>
    <body>
        Invalid username and/or password.<br>
        <a href="index.php">Main Menu</a>
    </body>
</html>
