<?php
    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userdb";
    session_start();


    function loginUser($user, $pass){
        global $servername, $username, $password, $userDB;
        $conn = new mysqli($servername, $username, $password, $userDB);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM users WHERE username = '". $user ."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        $verifyPw = password_verify($pass, $row['pw']);
        //echo $result->num_rows;
        
        if(($result->num_rows == 1) && $verifyPw){
            $_SESSION['uname'] = $user;
            $_SESSION['id'] = $row['idx'];
            $_SESSION['loggedin'] = true;
            echo "Success";
            //header("refresh:5;url=index.html");
        }else{
            echo "Invalid username/password";
        }        

    }
    
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['pw']) && !empty($_POST['pw'])){
        $user = $_POST['username'];
        $pass = $_POST['pw'];
        loginUser($user, $pass);
        
      } else{
        echo "Please enter a Username/Password";
      }


    

?>