<?php session_start();
// TODO: make sure no one can access this page without logging in first
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
    </head>
    <body>
        <h1>Enter the ID of the item to update.</h1><hr>
        <form action="display_for_update.php" method="post">
            ID: <input type="text" name="id" required />
            <input type="submit" />
        </form>
    </body>
</html>
