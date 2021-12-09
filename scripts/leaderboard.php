<?php
    // Requires testing

    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userDB";
    $gomokuDB = "gomokuDB";

    function displayTop10($db){
        GLOBAL $servername, $username, $password;
        $conn = new mysqli($servername, $username, $password, $db);
		// Check connection
	    if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error ."<br>");
	    }

        $temp = "<table>";
        $temp .= "<tr><th>Username</th>";
        $temp .= "<th>Wins</th>";
        $temp .= "<th>Games Played</th>";
        $temp .= "<th>Time Played</th>";

		$sql = "SELECT username, gameswon, gamesplayed, timeplayed FROM users ORDER BY gameswon DESC";
		$entries = $conn->query($sql);
        $count = 0;
        while (($row = mysqli_fetch_array($entries)) && ($count < 10) ){
			++$count;
            $temp .= "<tr>";
            $temp .= "<td>" . $row['username'] . "</td>"
            $temp .= "<td>" . $row['gameswon'] . "</td>"
            $temp .= "<td>" . $row['gamesplayed'] . "</td>"
            $temp .= "<td>" . $row['timeplayed'] . "</td>"
            $temp .= "</tr>";
		}
    
        $temp .= "</table>";
    
        echo $temp;
        $conn->close();
    }

    if(isset($_POST['callLeader']) && $_POST['callLeader'] == 'true'){
		// returns table as response
		displayTop10($userDB);
	}

?>