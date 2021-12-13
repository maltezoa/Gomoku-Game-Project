<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel = "stylesheet" type = "text/css" href = "./CSS/offlineGame.css">


    </head>
    <body class="background">
        <section class="title">

        <?php
            session_start();

            if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['uname'])) {
                $host = $_SESSION['uname'];
            } else {
                // sends to login page if no user logged in
                header('Location: login.php');
            }

        ?>

            <h1>Gomoku</h1>
        </section>


        <section class="display">
            <div id="colorform">
                <label for="p1color">Player 1 - Pick your color: </label>
                <select name="p1color" id="p1color">
                    <option value="red">Red tile</option>
                    <option value="green">Green tile</option>
                    <option value="blue">Blue tile</option>
                    <option value="yellow">Yellow tile</option>
                </select>
                <br>

                <label for="p2color">Player 2 - Pick your color: </label>
                <select name="p2color" id="p2color">
                    <option value="red">Red tile</option>
                    <option value="green">Green tile</option>
                    <option value="blue">Blue tile</option>
                    <option value="yellow">Yellow tile</option>
                </select>
                <br>
                <button onclick="createBoard(15)">Start a 15x15 game</button>
                <button onclick="createBoard(19)">Start a 19x19 game</button>
            </div>


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
            <button id="reset" onclick="location.href='index.php'">Main Menu</button>
        
        </section>
        <script src="./scripts/timer.js"></script>
        <script src="./scripts/game.js"></script>
    </body>
</html>