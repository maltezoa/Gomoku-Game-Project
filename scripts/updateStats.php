<?php 
    session_start();
    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userdb";
    $time = (isset($_POST['updateTime'])) ? $_POST['updateTime'] : "00:00:00";

    if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['uname'])) {
        $host = $_SESSION['uname'];
    } else {
        echo '<script>alert("No session detected, please log in to start a session.")</script>';
        header('Location: login.php');
    }


    function updateWins($time){
        GLOBAL $servername, $username, $password, $userDB, $host;
        $conn = new mysqli($servername, $username, $password, $userDB);
        // Check connection
	    if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error ."<br>");
	    }
       
        $sql = "UPDATE users SET gamesplayed = gamesplayed+1, gameswon = gameswon+1, timeplayed = (ADDTIME(timeplayed,'" . $time ."')) WHERE username ='" . $host . "'";

        if ($conn->query($sql) === TRUE) {
            $response = "Record updated successfully";
        } else {
            $response = "Error updating record: " . $conn->error;
        }
        
        echo $response;
        $conn->close();
        
    }

    function updateGames($time){
        GLOBAL $servername, $username, $password, $userDB, $host;
        $conn = new mysqli($servername, $username, $password, $userDB);
        // Check connection
	    if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error ."<br>");
	    }

        $sql = "UPDATE users SET gamesplayed = gamesplayed+1, timeplayed = (ADDTIME(timeplayed,'" . $time ."')) WHERE username ='" . $host . "'";

        if ($conn->query($sql) === TRUE) {
            $response = "Record updated successfully";
        } else {
            $response = "Error updating record: " . $conn->error;
        }
        
        echo $response;
        $conn->close();
        
    }


    if(isset($_POST['callGameWin']) && $_POST['callGameWin'] == 'true'){
        updateWins($time);

    } 
    elseif(isset($_POST['callGameLoss']) && $_POST['callGameLoss'] == 'true'){
        updateGames($time);
    }else {
        echo $time;
    }

?>