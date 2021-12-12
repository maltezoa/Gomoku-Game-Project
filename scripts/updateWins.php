<?php
    session_start();
    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userdb";

    if(isset($_POST['updateWin']) && (session_status() === PHP_SESSION_ACTIVE)){
        $initialWins = $_SESSION['wins'];
        $updatedWins = $initialWins + $_POST['updateWin'];
        $temp = "Host has won this many times: " . $updatedWins;
        echo '<script>alert( "success" );</script>' ;
    } else 


?>