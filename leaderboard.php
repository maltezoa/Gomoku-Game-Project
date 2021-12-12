<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>

        <!--
            Here we will be outputting leaderboard based on player wins. Requires PhP database to keep track.
            Dependecies:
                ID: Wins
                ID: Username
                ID: Time played
                ID: Games played
        -->
        <h1>Leaderboards</h1>

        <?php
            $servername = "localhost"; // hostname
            $username = "AdminLab12";
            $password = "4VPnroTOC6wOU3mn";
            $userDB = "userDB";
            
            $conn = new mysqli($servername, $username, $password, $userDB);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error ."<br>");
            }

            $temp = "<table>";
            $temp .= "<tr><th>Ranking</th>";
            $temp .= "<th>Username</th>";
            $temp .= "<th>Wins</th>";
            $temp .= "<th>Games Played</th>";
            $temp .= "<th>Time Played</th>";

            $sql = "SELECT username, gameswon, gamesplayed, timeplayed FROM users ORDER BY gameswon DESC";
            $entries = $conn->query($sql);
            $count = 0;
            while (($row = mysqli_fetch_array($entries)) && ($count < 10) ){
                ++$count;
                $temp .= "<tr>";
                $temp .= "<td>" . $count . "</td>";
                $temp .= "<td>" . $row['username'] . "</td>";
                $temp .= "<td>" . $row['gameswon'] . "</td>";
                $temp .= "<td>" . $row['gamesplayed'] . "</td>";
                $temp .= "<td>" . $row['timeplayed'] . "</td>";
                $temp .= "</tr>";
            }
        
            $temp .= "</table>";
        
            echo $temp;
            $conn->close();
        ?>
        
    </body>
</html>