<?php
    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userdb";

    if(isset($_POST['callLogout']) && $_POST['callLogout'] == 'true'){
        if(isset($_SESSION['uname'])){
            session_destroy();
            echo "Logged out";
        }
        echo "failed";

    }

?>