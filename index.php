<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Insert CSS File for Index Menu here-->
        <!--<link rel="stylesheet" href="./CSS/offlineGame.css" />-->
        <link rel="stylesheet" href="./CSS/newdesign.css" />
        
    </head>
    <body>
        <script src="./scripts/indexFxn.js"></script>
        
        <div class="menuBox">
            <ul id="loginBox">
                <li id="logBox1">
                    <?php 
                    session_start();

                    if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['uname'])) {
                        echo 'Logged in as ' . $_SESSION['uname'];
                      }
                    ?>
                </li>
            </ul>
            <div class="header">
                <h1 onmouseover="display(7)">Gomoku!</h1>
                <img src="images/bulldog.png" id= "bulldogImg" alt="FSU Bulldog">
            </div>
        <div id="leftCont">
        <ul id="menuList">
            <li class="menuItem" onmouseover="display(0)" onclick = "location.href='game.php'">Play Offline</li>
            <li class="menuItem" onmouseover="display(1)" onclick = "location.href='hotseatgame.php'">HotSeat Play</li>
            <li class="menuItem" onmouseover="display(2)" onclick = "location.href='contact.php'">Contact</li>
            <li class="menuItem" onmouseover="display(3)" onclick = "location.href='help.php'">How to Play</li>
            <li class="menuItem" onmouseover="display(4)" onclick = "location.href='leaderboard.php'">Leaderboard</li>
            <?php 

            if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['uname'])){
                echo "";
            }else {
                $temp = "'login.php'";
                $temp1 = "'register.php'";
                echo '<li class="menuItem" onmouseover="display(5)" onclick = "location.href=' . $temp . '">Login</li>
            <li class="menuItem" onmouseover="display(6)" onclick = "location.href='. $temp1. '">Register</li>';
            }
            
            ?>
            <button onclick="createUserDB()">Create DB</button>
            <button onclick="resetDB()">Reset DB Tables</button>
            <?php
                if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['uname'])) {
                    echo '<form method="post" action="">
                                <input type="submit" value="Logout" name="but_logout">
                        </form>';
                }
            ?>
            
        </ul>
        </div>

        <div id="rightCont">
            <img id="menuPic" src="images/gomoku.jpg" alt="Blank">
            <div id="menuDesc">
                <p>Welcome to Gomoku</p>
             </div>
        </div>
        </div>
        

        <?php

            if(isset($_POST['but_logout']) && (session_status() === PHP_SESSION_ACTIVE)){
                session_destroy();
                // create logout page to inform a successful logout then have a button to lead back to index.php
                header('Location: index.php');
            } 
            
        ?>
        </ul>

        

    </body>
</html>