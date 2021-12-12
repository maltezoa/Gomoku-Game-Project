<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel = "stylesheet" type = "text/css" href = "./CSS/offlineGame.css">


    </head>
    <body class="background">

        <section class="title">
            <h1>Gomoku</h1>
            <button onclick="createBoard(15)">Test</button>
            <button onclick="createBoard(19)">Test 2</button>
        </section>

        <section class="display">
            <p>Player <span class="display-player playerX">X</span>'s turn</p>
            <p>00:00:00</p>
        </section>


        <section id="board">
                
        </section>

        <section class="display announcer hide"></section>
        <section class="controls">
            <button id="reset" onclick="reset()">Reset</button>
        

        <script src="./scripts/offlineGame.js">
        </script>
    </body>
</html>