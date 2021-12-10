<?php
    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userdb";
    $gomokuDB = "gomokudb";

    function registerUser($user, $pass, $tile){
      global $servername, $username, $password, $userDB;
      $conn = new mysqli($servername, $username, $password, $userDB);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error ."<br>");
      }

      // Salt and Hash password 
      $salted_hash = password_hash($pass, PASSWORD_DEFAULT);
      
      // Test to see if verify works
      /*if (password_verify($pass, $salted_hash)){
        echo "Passwords match";
      } else {
        echo "Passwords don't match";
      }*/


      $sql = "INSERT INTO users
      VALUES (NULL, '". $user ."', '". $salted_hash ."', '0', '0', '0', '". $tile . ".png', current_timestamp());";

      
      if ($conn->query($sql) === TRUE) {
          $response = "Success";
        } else {
          $response = "Failed to register";
        }

      $conn->close();

      echo $response;
    }

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['pw']) && !empty($_POST['pw']) && isset($_POST['tilecolor'])){
      $user = $_POST['username'];
      $pass = $_POST['pw'];
      $tile = $_POST['tilecolor'];
      registerUser($user, $pass, $tile);
    } else{
      echo "Please enter a Username/Password";
    }
?>