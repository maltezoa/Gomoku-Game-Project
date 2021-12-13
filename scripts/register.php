<?php
    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userdb";

    function registerUser($user, $pass){
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
      VALUES (NULL, '". $user ."', '". $salted_hash ."', '0', '0', '0', current_timestamp());";

      
      if ($conn->query($sql) === TRUE) {
          $response = "Success";
        } else {
          $response = "Failed to register";
        }

      $conn->close();

      echo $response;
    }

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['pw']) && !empty($_POST['pw'])){
      $user = $_POST['username'];
      $pass = $_POST['pw'];
      registerUser($user, $pass);
    } else{
      echo "Please enter a Username/Password";
    }
?>