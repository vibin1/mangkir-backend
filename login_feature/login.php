<?php
    session_start();

    // case kalau user udah login sebelumnya
    if (isset($_SESSION["loggedIn"])) {
        header("Location: next.php");
        exit();
    }

    if (isset($_POST['login'])) {
        $conn = mysqli_connect("localhost", "root", "", "data");

        $email = $_POST['emailPHP'];
        $pwd = md5($_POST["passwordPHP"]);

        $query = mysqli_query($conn, "SELECT * FROM account WHERE email = '$email' AND pwd = '$pwd'");
        if (mysqli_num_rows($query) > 0){
            $_SESSION["loggedIn"] = '1';
            $_SESSION["email"] = $email;
            exit("Login success...");
        }else{
            echo 2;
            exit("Please check your inputs...");
        }
    }