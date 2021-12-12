<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel = "stylesheet" type = "text/css" href = "./CSS/offlineGame.css">


    </head>
    <body class="background">
    <?php
            session_start();

            if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['uname'])) {
                $host = $_SESSION['uname'];
            } else {
                echo '<script>alert("Please log in first.")</script>';;
                header('Location: login.php');
            }

        ?>

        <section class="title">
            <h1>Gomoku</h1>
            <button onclick="createBoard(15)">Test</button>
            <button onclick="createBoard(19)">Test 2</button>
        </section>

        <section class="display">
            <p id="playerName">Host's turn</span></p>
            <div id="stopwatch">
                00:00:00
            </div>
        </section>

        <section id="board">
                
        </section>

        <section class="display announcer hide"></section>
        <section class="controls">
            <button id="reset" onclick="reset()">Reset</button>
        
        
        <script src="./scripts/timer.js"></script>
        <script src="./scripts/game.js"></script>
    </body>
</html>