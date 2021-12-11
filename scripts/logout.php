<?php
    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userdb";
    include 'login.php';
    session_start();

    function logoutTest(){
        echo "Hello";
    }

    if(isset($_POST['callLogout']) && $_POST['callLogout'] == 'true'){
        logoutTest();
    }

?>