<?php
    session_start();

    if (!isset($_SESSION['loggedIn'])){
        header("Location: index.php");
        exit();
    }
?>
<a href="logout.php">LOGOUT</a> <br>
you are logged in