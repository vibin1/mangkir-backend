<?php
$conn = mysqli_connect("localhost", "root", "", "data");

// Choose a function depends on value of $_POST["action"]
if($_POST["action"] == "insert"){
  insert();
}

// Function
function insert(){
  global $conn;

  $name = $_POST["name"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

  // Check if variable value is empty
  if(empty($name) || empty($email) || empty($pwd)){
    // Output
    echo "";
    exit;
  }

  // Check if email still available
  $sameEmail = mysqli_query($conn, "SELECT * FROM tb_data WHERE email = '$email'");
  if(mysqli_num_rows($sameEmail) > 0){
    // Output
    echo 2;
    exit;
  }


  // Insert value to database
  $query = "INSERT INTO account VALUES('$email', '$name', '$pwd')";
  mysqli_query($conn, $query);
  // Output
  echo 1;
}
