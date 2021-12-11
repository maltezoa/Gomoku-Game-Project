<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Insert CSS File for Index Menu here-->
    </head>
    <body>
        <script>
        function createUserDB() {
        // Creates the DB with entries from the keyboards.json file
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if(req.readyState == 4 && req.status == 200){
                alert("Creating new databases");
            }
        }
        req.open("POST", "./scripts/database.php", true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send("callDBCreate=true");
	}

    function resetDB() {
        // Creates the DB with entries from the keyboards.json file
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if(req.readyState == 4 && req.status == 200){
                alert("Creating new databases");
                
            }
        }
        req.open("POST", "./scripts/database.php", true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send("callReset=true");
	}
    
        </script>
        
        <!-- Menu -->
        <ul>
            <li><a href="#">Play Offline</a></li>
            <li><a href="#">Play Online</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">How to Play</a></li>
            <li><a href="#">Leaderboard</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
            <!-- Needs a logout button and DOM replacement for Login top menu when sessions is True -->

            <button onclick="createUserDB()">Create DB</button>
            <button onclick="resetDB()">Reset DB Tables</button>
            <form method='post' action="">
                <input type="submit" value="Logout" name="but_logout">
            </form>

        <?php
            session_start();

            if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['uname'])) {
                echo 'Logged in as ' . $_SESSION['uname'];
              }

            if(isset($_POST['but_logout']) && (session_status() === PHP_SESSION_ACTIVE)){
                session_destroy();
                // create logout page to inform a successful logout then have a button to lead back to index.php
                header('Location: index.php');
            }
            
        ?>
        </ul>


    </body>
</html>