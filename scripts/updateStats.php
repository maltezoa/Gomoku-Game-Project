<?php 
    session_start();
    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userdb";

    if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['uname'])) {
        $host = $_SESSION['uname'];
    } else {
        echo '<script>alert("No session detected, please log in to start a session.")</script>';
        header('Location: login.php');
    }


    function updateWins(){
        GLOBAL $servername, $username, $password, $userDB, $host;
        $conn = new mysqli($servername, $username, $password, $userDB);
        // Check connection
	    if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error ."<br>");
	    }
       
        $sql = "UPDATE users SET gamesplayed = gamesplayed+1, gameswon = gameswon+1 WHERE username ='" . $host . "'";

        if ($conn->query($sql) === TRUE) {
            $response = "Record updated successfully";
        } else {
            $response = "Error updating record: " . $conn->error;
        }
        
        echo $response;
        $conn->close();
        
    }

    function updateGames(){
        GLOBAL $servername, $username, $password, $userDB, $host;
        $conn = new mysqli($servername, $username, $password, $userDB);
        // Check connection
	    if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error ."<br>");
	    }

        $sql = "UPDATE users SET gamesplayed = gamesplayed+1 WHERE username ='" . $host . "'";

        if ($conn->query($sql) === TRUE) {
            $response = "Record updated successfully";
        } else {
            $response = "Error updating record: " . $conn->error;
        }
        
        echo $response;
        $conn->close();
        
    }


    if(isset($_POST['callGameWin']) && $_POST['callGameWin'] == 'true'){
        updateWins();

    } 
    elseif(isset($_POST['callGameLoss']) && $_POST['callGameLoss'] == 'true'){
        updateGames();
    }else {
        echo "Ding dong error.";
    }

?>